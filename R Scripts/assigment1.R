## Packages
library(tidyr)
library(tidyverse)
library(gapminder)
library(ggplot2)
library(dplyr)

library(caret)
library(MLTools)
library(ggcorrplot)

library(pROC) # for plotting ROC curves.
library(skimr) # for dataset initial exploration
library(GGally) # for ggpairs
library(corrplot) # for correlation plots

library(pROC)
library(kernlab)

## Set working directory 
setwdOK <- try(setwd(dirname(rstudioapi::getActiveDocumentContext()$path)))

## Dataset
fdata <- read_delim("./Data/MortgageClass.csv")
slice_head(fdata, n=5)

## Duplicate Variables
which(duplicated(fdata))


## Missing Variables
#As the are only 8 missing values, all of them in the Interest_Rate_orig.
#And the are 1045 rows in the dataset, we have consider to drop this 8 rows.
#Because it represents less than 8% of the total dataset.
fdata %>% skim_without_charts()


fdata <- fdata  %>% 
  drop_na()

fdata %>% skim_without_charts()



## Change variable Default to factor
#Due to the output variable (Default = Y) is a classification variable, we change the varibale to factor
factorCols <- c("Default")

fdata <- fdata %>% 
  mutate(across(.cols = all_of(factorCols), 
                .fns = factor)) %>% 
  mutate(Default = factor(Default, labels = c("NO", "YES")))


## Check out for outliers
fdata %>% 
  select(where(is_bare_numeric)) %>%  # Only pure numeric
  pivot_longer(cols = everything(), names_to = "variable") %>% 
  ggplot(aes(x = value)) +
  geom_boxplot() + ylim(-0.6, 0.6) + # manual proportion adjustment    
  facet_wrap(~ variable, scales = "free", ncol = 2)


## Analyse Variables

#- Correlation plot
#Function for plotting a matrix correlation between the data variables
fdata %>%
  select(where(is_bare_numeric)) %>%
  cor %>%
  ggcorrplot::ggcorrplot(corr = ., type="lower",
                         method = "square", lab=TRUE)

#- Pair plot
#Function for plotting multiple plots between the output of a data frame
#and the predictors of this output.
outvar <- "Default"

ggpairs(fdata,aes(color = Default, alpha = 0.3))
PlotDataframe(fdata = fdata, 
              output.name = outvar)


# Check out for Class Imbalances
#As we can check in the plot beloow there is a big imbalance in the output variable, this will probably make our prediction worst.
fdata %>% 
  rename(Y = outvar) %>%
  count(Y) %>% 
  rename_with(.cols = Y, .fn = ~outvar)


fdata %>% 
  rename(Y = outvar) %>%
  count(Y) %>% 
  mutate(percent = paste0(n, " =\n", signif(100 * n/sum(n), 4), "%")) %>% 
  ggplot(aes(x = Y, y = n)) + 
  geom_col(fill = "tan") + 
  geom_text(aes(label = percent), nudge_y = -100, size=4)


# Split data into Train and Test Set
set.seed(2023)
outCol <- grep(outvar, names(fdata))

trainIndex <- createDataPartition(fdata[ , outCol] %>% pull,      #output variable.
                                  p = 0.8,      #split probability for training
                                  list = FALSE, #Avoid output as a list
                                  times = 1)    #only one partition

fTR <- fdata %>% 
  slice(trainIndex)

fTS <- fdata %>% 
  slice(-trainIndex)

fTR %>% 
  rename( Y = outvar) %>%
  count(Y) %>% 
  mutate(prop = n/sum(n))

fTS %>% 
  rename( Y = outvar) %>%
  count(Y) %>% 
  mutate(prop = n/sum(n))

# Visualization of Train and Test Set
#Boxplot
# fTR %>% 
#   select(where(is_bare_numeric)) %>%  # Only pure numeric
#   pivot_longer(cols = everything(), names_to = "variable") %>% 
#   ggplot(aes(x = value)) +
#   geom_boxplot() +  ylim(-0.6, 0.6) + # manual proportion adjustment    
#   facet_wrap(~ variable, scales = "free", ncol = 2) + ggtitle("Training set")
# 
# fTS %>% 
#   select(where(is_bare_numeric)) %>%  # Only pure numeric
#   pivot_longer(cols = everything(), names_to = "variable") %>% 
#   ggplot(aes(x = value)) +
#   geom_boxplot() +  ylim(-0.6, 0.6) + # manual proportion adjustment    
#   facet_wrap(~ variable, scales = "free", ncol = 2) + ggtitle("Test set")



# Model training
ctrl <- trainControl(method = "cv",                        # k-fold cross-validation
                     number = 10,                          # Number of folds
                     summaryFunction = defaultSummary,     # Performance summary for comparing models in hold-out samples.
                     savePredictions = TRUE,
                     classProbs = TRUE)                    # Compute class probs in Hold-out samples








#-------------------------------------------------------------------------------
#Logistic Regression------------------------------------------------------------
#-------------------------------------------------------------------------------
fTR_eval <- fTR
fTS_eval <- fTS
LogReg.fit <- train(form = Default ~ ., #formula for specifying inputs and outputs.
                    data = fTR,               #Training dataset 
                    method = "glm",                   #Train logistic regression
                    preProcess = c("center","scale"), #Center an scale inputs
                    trControl = ctrl,                 #trainControl Object
                    metric = "Accuracy")              #summary metric used for selecting hyperparameters

LogReg.fit$resample %>% 
  ggplot(aes(x = Accuracy)) + 
  geom_boxplot() + ylim(-0.6, 0.6) + # manual proportion adjustment    
  ylim(-0.6, 0.6) + # manual proportion adjustment    
  ggtitle("Accuracy Metrics - Logistic Regression Model")

#LogReg.fit          # information about the resampling

#summary(LogReg.fit) # detailed information about the fit of the final model

## Model Evaluation
# Evaluate the model with training and test sets

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(LogReg_prob = predict(LogReg.fit, type="prob", newdata = fTR),
         # and classes
         LogReg_pred = predict(LogReg.fit, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  mutate(LogReg_prob = predict(LogReg.fit, type="prob", newdata = fTS),
         # and classes
         LogReg_pred = predict(LogReg.fit, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$LogReg_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$LogReg_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$LogReg_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)


#-------------------------------------------------------------------------------
##Decission Tree----------------------------------------------------------------
#-------------------------------------------------------------------------------
library(rpart)
library(rpart.plot)
library(partykit)
tree.fit <- train(Default ~ .,   # Model formula
                  data = fTR, 
                  method = "rpart",   # Decision tree with cp as tuning parameter
                  control = rpart.control(minsplit = 5,  # Minimum number of obs in node to keep cutting
                                          minbucket = 5), # Minimum number of obs in a terminal node
                  parms = list(split = "gini"),          # impuriry measure
                  #tuneGrid = data.frame(cp = 0.025), # TRY this: tuneGrid = data.frame(cp = 0.25),
                  #tuneLength = 10,
                  tuneGrid = data.frame(cp = seq(from= 0, to = 0.05, by = 0.0005)),
                  trControl = ctrl, 
                  metric = "Accuracy")

#tree.fit

#ggplot(tree.fit) # Plot the summary metric as a function of the tuning parameter

#summary(tree.fit)

#tree.fit$finalModel # Cuts perform

rpart.plot(tree.fit$finalModel, type = 2, fallen.leaves = FALSE, box.palette = "Oranges")

tree.fit.party <- as.party(tree.fit$finalModel)
plot(tree.fit.party)

plot(tree.fit$finalModel, uniform = TRUE, margin = 0)
text(tree.fit$finalModel, use.n = TRUE, all = TRUE, cex = .8)

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(tree_prob = predict(tree.fit, type="prob", newdata = fTR),
         # and classes
         tree_pred = predict(tree.fit, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(tree_prob = predict(tree.fit, type="prob", newdata = fTS),
         # and classes
         tree_pred = predict(tree.fit, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$tree_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$tree_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$tree_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)

#cv_results <- train(Default ~ ., data = fTR, method = "rpart", trControl = ctrl)

#-------------------------------------------------------------------------------
# Random Forest Model-----------------------------------------------------
#-------------------------------------------------------------------------------
library(randomForest)
rf.fit <- train(Default ~ .,   # Model formula
                  data = fTR,
                  method = "rf", # Random forest
                  ntree = 200,  # Number of trees to grow
                  tuneGrid = data.frame(mtry = seq(1, ncol(fTR) - 1)),           
                  # tuneLength = 4,
                  trControl = ctrl, # Resampling settings 
                  metric = "Accuracy") # Summary metrics


# rf.fit # Information about the resampling settings
# 
# ggplot(rf.fit) # Plot the summary metric as a function of the tuning parameter
# 
# summary(rf.fit)  # Information about the model trained

rf.fit$finalModel # Cuts performed and nodes. Also shows the number and 
# percentage of cases in each node.

# Measure for variable importance
varImp(rf.fit,scale = FALSE)
plot(varImp(rf.fit,scale = FALSE))

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(rf_prob = predict(rf.fit, type="prob", newdata = fTR),
         # and classes
         rf_pred = predict(rf.fit, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(rf_prob = predict(rf.fit, type="prob", newdata = fTS),
         # and classes
         rf_pred = predict(rf.fit, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$rf_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$rf_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$rf_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)


#-------------------------------------------------------------------------------
##KNN---------------------------------------------------------------------------
#-------------------------------------------------------------------------------
k_grid <- seq(3, 120, 4)

knn.fit = train(form = Default ~ ., #formula for specifying inputs and outputs.
                data = fTR,
                method = "knn",
                preProcess = c("center","scale"),
                #tuneGrid = data.frame(k = 5),
                tuneGrid = data.frame(k = k_grid),
                #tuneLength = 10,
                trControl = ctrl, 
                metric = "Accuracy")

knn.fit # Information about the settings

ggplot(knn.fit) # Plot the summary metric as a function of the tuning parameter

knn.fit$finalModel # Information about final model trained

## Model Evaluation 
# Evaluate the model with training and test sets

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(knn_prob = predict(knn.fit, type="prob", newdata = fTR),
         # and classes
         knn_pred = predict(knn.fit, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(knn_prob = predict(knn.fit, type="prob", newdata = fTS),
         # and classes
         knn_pred = predict(knn.fit, type="raw", newdata = fTS))

# Training
confusionMatrix(fTR_eval$knn_pred, 
                fTR_eval$Default, 
                positive = "YES")

# Test
confusionMatrix(fTS_eval$knn_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$knn_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)


#-------------------------------------------------------------------------------
##SVM - Linear 
#-------------------------------------------------------------------------------
svm.fit <- train(form = Default ~ .,
                 data = fTR,   #Training dataset
                 method = "svmLinear",
                 preProcess = c("center","scale"),
                 # 1) try C=0.1
                 # tuneGrid = data.frame(C = 0.1),
                 # 2) try C=10 and compare with C=0.1
                 # tuneGrid = data.frame(C = 10000),
                 # 3) find the optimal value of C
                 tuneGrid = expand.grid(C = c(0.00001, 0.0001, 0.001, 0.01, 0.1, 1, 10, 100, 1000)),
                 # tuneGrid = data.frame(C = seq(8, 10.2, 0.1)),
                 # tuneLength = 10,
                 trControl = ctrl, 
                 metric = "Accuracy")

svm.fit # Information about the resampling settings

ggplot(svm.fit) + scale_x_log10()

svm.fit$finalModel # Information about the model trained

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(svm_prob = predict(svm.fit, type="prob", newdata = fTR),
         # and classes
         svm_pred = predict(svm.fit, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(svm_prob = predict(svm.fit, type="prob", newdata = fTS),
         # and classes
         svm_pred = predict(svm.fit, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$svm_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$svm_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$svm_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)

#-------------------------------------------------------------------------------
##SVM - Radial 
#-------------------------------------------------------------------------------
svmR.fit = train(form = Default ~ ., #formula for specifying inputs and outputs.
                 data = fTR,   #Training dataset 
                 method = "svmRadial",
                 preProcess = c("center","scale"),
                 #tuneGrid = expand.grid(C = c(0.001,0.01,0.1,1,10,100,1000), sigma=c(0.0001,0.001,0.01,0.1,1,10)),
                 #tuneGrid =  data.frame(sigma = 10, C = 100),  
                 tuneGrid = expand.grid(C = seq(0.1,1000,length.out = 8), sigma=seq(0.01,50,length.out = 4)),
                 #tuneLength = 10,
                 trControl = ctrl, 
                 metric = "Accuracy")

svmR.fit # Information about the resampling settings

ggplot(svmR.fit) + scale_x_log10()

svmR.fit$finalModel # Information about the model trained

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(svmR_prob = predict(svmR.fit, type="prob", newdata = fTR),
         # and classes
         svmR_pred = predict(svmR.fit, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(svmR_prob = predict(svmR.fit, type="prob", newdata = fTS),
         # and classes
         svmR_pred = predict(svmR.fit, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$svmR_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$svmR_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$svmR_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)
#-------------------------------------------------------------------------------
## NEURAL NETWORKS--------------------------------------------------------------
#-------------------------------------------------------------------------------
library(NeuralNetTools) 
library(nnet)
library(NeuralSens)

mlp.fit <- train(form = Default ~ ., 
                 data = fTR,   
                 method = "nnet",
                 preProcess = c("center","scale"),
                 maxit = 200,    # Maximum number of iterations
                 # Try the following line with size = 1, 2, 10
                 # Then try keeping a reasonable number of neurons and different decays
                 # tuneGrid = data.frame(size = 1, decay = 0),
                 tuneGrid = expand.grid(size = seq(5, 15, length.out = 10),
                                        decay=c(10^(-9), 0.0001, 0.001, 0.01, 0.1, 1)),
                 # trace = FALSE, #to suppress progress messages
                 trControl = ctrl, 
                 metric = "Accuracy")

mlp.fit # information about the resampling settings

ggplot(mlp.fit) + scale_x_log10()

mlp.fit$finalModel # Information about the model trained

#summary(mlp.fit$finalModel) #information about the network and weights


# Statistical sensitivity analysis

SensAnalysisMLP(mlp.fit) 

#Evaluate the model with training and test sets
#training
fTR_eval$mlp_prob = predict(mlp.fit, type="prob" , newdata = fTR) # predict probabilities
fTR_eval$mlp_pred = predict(mlp.fit, type="raw" , newdata = fTR) # predict classes 
#test
fTS_eval$mlp_prob = predict(mlp.fit, type="prob" , newdata = fTS) # predict probabilities
fTS_eval$mlp_pred = predict(mlp.fit, type="raw" , newdata = fTS) # predict classes

# Training
confusionMatrix(data = fTR_eval$mlp_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# test
confusionMatrix(fTS_eval$mlp_pred, 
                fTS_eval$Default, 
                positive = "YES")
PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$mlp_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)






#-------------------------------------------------------------------------------
## COMPARATION------------------------------------------------------------------
#-------------------------------------------------------------------------------
## Comparison of models in training and test set --------------------------------------------------------

# TRAINING

# Resampling summary metric

transformResults <- resamples(list(knn= knn.fit, decission_tree=tree.fit,rf=rf.fit,lr=LogReg.fit,svmLinear = svm.fit, svmRadial = svmR.fit, MLP = mlp.fit))
summary(transformResults)
ggplot(transformResults, metric = c("Accuracy", "Kappa"), scales = "free") 


# ROC curve
suppressMessages({
  rocObj_lr <- roc(response = fTR_eval$Default, fTR_eval$LogReg_prob$YES)
  rocObj_tree <- roc(response = fTR_eval$Default, fTR_eval$tree_prob$YES)
  rocObj_rf <- roc(response = fTR_eval$Default, fTR_eval$rf_prob$YES)
  rocObj_knn <- roc(response = fTR_eval$Default, fTR_eval$knn_prob$YES)
  rocObj_svmL <- roc(response = fTR_eval$Default, fTR_eval$svm_prob$YES)
  rocObj_svmR <- roc(response = fTR_eval$Default, fTR_eval$svmR_prob$YES)
  rocObj_mlp <- roc(response = fTR_eval$Default, fTR_eval$mlp_prob$YES)
})

ggroc(list(decission_tree =rocObj_tree, Random_Forest=rocObj_rf, KNN =rocObj_knn, Logaristic_Regression=rocObj_lr, svm_linear = rocObj_svmL, svm_radial = rocObj_svmR, mlp = rocObj_mlp)) + 
  geom_abline(slope = 1, intercept = 1) + 
  labs(title = "ROC Curves for Training Set", 
       x = "Specificity", y = "Sensitivity")



# TEST ----------------------
# Overall accuracy
accuracyTsLR<- confusionMatrix(fTS_eval$LogReg_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsKnn <- confusionMatrix(fTS_eval$knn_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsTree <- confusionMatrix(fTS_eval$tree_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsRF <- confusionMatrix(fTS_eval$rf_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsSvmL <- confusionMatrix(fTS_eval$svm_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsSvmR <- confusionMatrix(fTS_eval$svmR_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsMlp <- confusionMatrix(fTS_eval$mlp_pred, fTS_eval$Default, positive = "YES")$overall[1]

# Create data
data <- data.frame(
  name=c("LogReg","KNN","Tree","RF","SVMLinear","SVMRadial","Mlp") ,  
  value=c(accuracyTsLR,accuracyTsKnn,accuracyTsTree,accuracyTsRF,accuracyTsSvmL,accuracyTsSvmR,accuracyTsMlp)
)

ggplot(data, aes(x=name, y=value)) +
  geom_segment( aes(x=name, xend=name, y=0, yend=value), color="skyblue") +
  geom_point( color="blue", size=3, alpha=0.6) +
  geom_text(aes(label = round(value, 3), x = name, y = value+0.1), color = "black", size = 3) +
  theme_light() +
  coord_flip() +
  ylab("Test accuracy") +
  xlab("Model")+
  theme(
    panel.grid.major.y = element_blank(),
    panel.border = element_blank(),
    axis.ticks.y = element_blank()
  )


# ROC curve
suppressMessages({
  rocObj_LR <- roc(response = fTS_eval$Default, fTS_eval$LogReg_prob$YES)
  rocObj_tree <- roc(response = fTS_eval$Default, fTS_eval$tree_prob$YES)
  rocObj_rf <- roc(response = fTS_eval$Default, fTS_eval$rf_prob$YES)
  rocObj_knn <- roc(response = fTS_eval$Default, fTS_eval$knn_prob$YES)
  rocObj_svmL <- roc(response = fTS_eval$Default, fTS_eval$svm_prob$YES)
  rocObj_svmR <- roc(response = fTS_eval$Default, fTS_eval$svmR_prob$YES)
  rocObj_mlp <- roc(response = fTS_eval$Default, fTS_eval$mlp_prob$YES)
})
dev.off()


ggroc(list(decission_tree =rocObj_tree, Random_Forest =rocObj_rf,svm_linear = rocObj_svmL, svm_radial = rocObj_svmR, mlp = rocObj_mlp,KNN =rocObj_knn, Logaristic_Regression=rocObj_LR)) + 
  geom_abline(slope = 1, intercept = 1) + 
  labs(title = "ROC Curves for Test Set", 
       x = "Specificity", y = "Sensitivity")








#-------------------------------------------------------------------------------
#-------------------------------------------------------------------------------
#-------------------------------------------------------------------------------







## Lest try to do the same droping some values - No Imbalance

fTR_list <- downSample(x = fTR[, names(fTR) != "Default"], y = fTR$Default, yname = "Default")
fTR_balanced <- as.data.frame(fTR_list)

fTR_balanced %>% 
  rename(Y = outvar) %>%
  count(Y) %>% 
  mutate(percent = paste0(n, " =\n", signif(100 * n/sum(n), 4), "%")) %>% 
  ggplot(aes(x = Y, y = n)) + 
  geom_col(fill = "tan") + 
  geom_text(aes(label = percent), nudge_y = -100, size=4)

#-------------------------------------------------------------------------------
#Logistic Regression Model - Balanced
#-------------------------------------------------------------------------------
fTR_eval <- fTR
fTS_eval <- fTS
LogReg.fit_balanced <- train(form = Default ~ ., #formula for specifying inputs and outputs.
                             data = fTR_balanced,               #Training dataset 
                             method = "glm",                   #Train logistic regression
                             preProcess = c("center","scale"), #Center an scale inputs
                             trControl = ctrl,                 #trainControl Object
                             metric = "Accuracy")              #summary metric used for selecting hyperparameters

LogReg.fit_balanced$resample %>% 
  ggplot(aes(x = Accuracy)) + 
  geom_boxplot() + ylim(-0.6, 0.6) + # manual proportion adjustment    
  ylim(-0.6, 0.6) + # manual proportion adjustment    
  ggtitle("Accuracy Metrics of Test Resamples")

fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(LogReg_prob = predict(LogReg.fit_balanced, type="prob", newdata = fTR),
         # and classes
         LogReg_pred = predict(LogReg.fit_balanced, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  mutate(LogReg_prob = predict(LogReg.fit_balanced, type="prob", newdata = fTS),
         # and classes
         LogReg_pred = predict(LogReg.fit_balanced, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$LogReg_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$LogReg_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$LogReg_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)



#-------------------------------------------------------------------------------
#Decission Tree Model - Balanced
#-------------------------------------------------------------------------------
tree.fit_balanced <- train(Default ~ .,   # Model formula
                  data = fTR_balanced, 
                  method = "rpart",   # Decision tree with cp as tuning parameter
                  control = rpart.control(minsplit = 5,  # Minimum number of obs in node to keep cutting
                                          minbucket = 5), # Minimum number of obs in a terminal node
                  parms = list(split = "gini"),          # impuriry measure
                  #tuneGrid = data.frame(cp = 0.025), # TRY this: tuneGrid = data.frame(cp = 0.25),
                  #tuneLength = 10,
                  tuneGrid = data.frame(cp = seq(from= 0, to = 0.05, by = 0.0005)),
                  trControl = ctrl, 
                  metric = "Accuracy")

plot(tree.fit_balanced$finalModel, uniform = TRUE, margin = 0)
text(tree.fit_balanced$finalModel, use.n = TRUE, all = TRUE, cex = .8)

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(tree_prob = predict(tree.fit_balanced, type="prob", newdata = fTR),
         # and classes
         tree_pred = predict(tree.fit_balanced, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(tree_prob = predict(tree.fit_balanced, type="prob", newdata = fTS),
         # and classes
         tree_pred = predict(tree.fit_balanced, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$tree_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$tree_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$tree_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)



#-------------------------------------------------------------------------------
# Random Forest Model - Balanced
#-------------------------------------------------------------------------------
library(randomForest)
rf.fit_balanced <- train(Default ~ .,   # Model formula
                data = fTR_balanced,
                method = "rf", # Random forest
                ntree = 200,  # Number of trees to grow
                tuneGrid = data.frame(mtry = seq(1, ncol(fTR) - 1)),           
                # tuneLength = 4,
                trControl = ctrl, # Resampling settings 
                metric = "Accuracy") # Summary metrics


# rf.fit # Information about the resampling settings
# 
# ggplot(rf.fit) # Plot the summary metric as a function of the tuning parameter
# 
# summary(rf.fit)  # Information about the model trained

rf.fit_balanced$finalModel # Cuts performed and nodes. Also shows the number and 
# percentage of cases in each node.

# Measure for variable importance
varImp(rf.fit_balanced,scale = FALSE)
plot(varImp(rf.fit_balanced,scale = FALSE))

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(rf_prob = predict(rf.fit_balanced, type="prob", newdata = fTR),
         # and classes
         rf_pred = predict(rf.fit_balanced, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(rf_prob = predict(rf.fit_balanced, type="prob", newdata = fTS),
         # and classes
         rf_pred = predict(rf.fit_balanced, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$rf_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$rf_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$rf_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)

#-------------------------------------------------------------------------------
##KNN - Balanced
#-------------------------------------------------------------------------------
k_grid <- seq(3, 120, 4)

knn.fit_balanced = train(form = Default ~ ., #formula for specifying inputs and outputs.
                data = fTR_balanced,
                method = "knn",
                preProcess = c("center","scale"),
                #tuneGrid = data.frame(k = 5),
                tuneGrid = data.frame(k = k_grid),
                #tuneLength = 10,
                trControl = ctrl, 
                metric = "Accuracy")

knn.fit_balanced # Information about the settings

ggplot(knn.fit_balanced) # Plot the summary metric as a function of the tuning parameter

knn.fit_balanced$finalModel # Information about final model trained

## Model Evaluation 
# Evaluate the model with training and test sets

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(knn_prob = predict(knn.fit_balanced, type="prob", newdata = fTR),
         # and classes
         knn_pred = predict(knn.fit_balanced, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(knn_prob = predict(knn.fit_balanced, type="prob", newdata = fTS),
         # and classes
         knn_pred = predict(knn.fit_balanced, type="raw", newdata = fTS))

# Training
confusionMatrix(fTR_eval$knn_pred, 
                fTR_eval$Default, 
                positive = "YES")

# Test
confusionMatrix(fTS_eval$knn_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$knn_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)


#-------------------------------------------------------------------------------
##SVM linear - Balanced
#-------------------------------------------------------------------------------
svm.fit_balanced <- train(form = Default ~ .,
                 data = fTR_balanced,   #Training dataset
                 method = "svmLinear",
                 preProcess = c("center","scale"),
                 # 1) try C=0.1
                 # tuneGrid = data.frame(C = 0.1),
                 # 2) try C=10 and compare with C=0.1
                 # tuneGrid = data.frame(C = 10000),
                 # 3) find the optimal value of C
                 tuneGrid = expand.grid(C = c(0.00001, 0.0001, 0.001, 0.01, 0.1, 1, 10, 100, 1000)),
                 # tuneGrid = data.frame(C = seq(8, 10.2, 0.1)),
                 # tuneLength = 10,
                 trControl = ctrl, 
                 metric = "Accuracy")

svm.fit_balanced # Information about the resampling settings

ggplot(svm.fit_balanced) + scale_x_log10()

svm.fit_balanced$finalModel # Information about the model trained

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(svm_prob = predict(svm.fit_balanced, type="prob", newdata = fTR),
         # and classes
         svm_pred = predict(svm.fit_balanced, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(svm_prob = predict(svm.fit_balanced, type="prob", newdata = fTS),
         # and classes
         svm_pred = predict(svm.fit_balanced, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$svm_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$svm_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$svm_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)

#-------------------------------------------------------------------------------
##SVM - Radial - Balanced
#-------------------------------------------------------------------------------
svmR.fit_balanced = train(form = Default ~ ., #formula for specifying inputs and outputs.
                 data = fTR_balanced,   #Training dataset 
                 method = "svmRadial",
                 preProcess = c("center","scale"),
                 #tuneGrid = expand.grid(C = c(0.001,0.01,0.1,1,10,100,1000), sigma=c(0.0001,0.001,0.01,0.1,1,10)),
                 #tuneGrid =  data.frame(sigma = 10, C = 100),  
                 tuneGrid = expand.grid(C = seq(0.1,1000,length.out = 8), sigma=seq(0.01,50,length.out = 4)),
                 #tuneLength = 10,
                 trControl = ctrl, 
                 metric = "Accuracy")

svmR.fit_balanced # Information about the resampling settings

ggplot(svmR.fit_balanced) + scale_x_log10()

svmR.fit_balanced$finalModel # Information about the model trained

## Model Evaluation 
# Evaluate the model with training and test sets 

# Training set model predictions
fTR_eval <- fTR_eval %>%
  # predict probabilities
  mutate(svmR_prob = predict(svmR.fit_balanced, type="prob", newdata = fTR),
         # and classes
         svmR_pred = predict(svmR.fit_balanced, type="raw", newdata = fTR))

# Test set model predictions
fTS_eval <- fTS_eval %>%
  # predict probabilities
  mutate(svmR_prob = predict(svmR.fit_balanced, type="prob", newdata = fTS),
         # and classes
         svmR_pred = predict(svmR.fit_balanced, type="raw", newdata = fTS))

# Training
confusionMatrix(data = fTR_eval$svmR_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# Test
confusionMatrix(fTS_eval$svmR_pred, 
                fTS_eval$Default, 
                positive = "YES")

PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$svmR_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)

#-------------------------------------------------------------------------------
## NEURAL NETWORKS--------------------------------------------------------------
#-------------------------------------------------------------------------------
library(NeuralNetTools) 
library(nnet)
library(NeuralSens)

mlp.fit_balanced <- train(form = Default ~ ., 
                 data = fTR_balanced,   
                 method = "nnet",
                 preProcess = c("center","scale"),
                 maxit = 200,    # Maximum number of iterations
                 # Try the following line with size = 1, 2, 10
                 # Then try keeping a reasonable number of neurons and different decays
                 # tuneGrid = data.frame(size = 1, decay = 0),
                 tuneGrid = expand.grid(size = seq(5, 15, length.out = 10),
                                        decay=c(10^(-9), 0.0001, 0.001, 0.01, 0.1, 1)),
                 # trace = FALSE, #to suppress progress messages
                 trControl = ctrl, 
                 metric = "Accuracy")

mlp.fit_balanced # information about the resampling settings

ggplot(mlp.fit_balanced) + scale_x_log10()

mlp.fit_balanced$finalModel # Information about the model trained

#Evaluate the model with training and test sets
#training
fTR_eval$mlp_prob = predict(mlp.fit_balanced, type="prob" , newdata = fTR) # predict probabilities
fTR_eval$mlp_pred = predict(mlp.fit_balanced, type="raw" , newdata = fTR) # predict classes 
#test
fTS_eval$mlp_prob = predict(mlp.fit_balanced, type="prob" , newdata = fTS) # predict probabilities
fTS_eval$mlp_pred = predict(mlp.fit_balanced, type="raw" , newdata = fTS) # predict classes

# Training
confusionMatrix(data = fTR_eval$mlp_pred, #Predicted classes
                reference = fTR_eval$Default, #Real observations
                positive = "YES") #Class labeled as Positive
# test
confusionMatrix(fTS_eval$mlp_pred, 
                fTS_eval$Default, 
                positive = "YES")
PlotClassPerformance(fTS_eval$Default,       #Real observations
                     fTS_eval$mlp_prob,  #predicted probabilities
                     selClass = "YES") #Class to be analyzed)













#-------------------------------------------------------------------------------
## COMPARATION------------------------------------------------------------------
#-------------------------------------------------------------------------------
## Comparison of models in training and test set --------------------------------------------------------

# TRAINING

# Resampling summary metric

transformResults <- resamples(list(knn= knn.fit_balanced, decission_tree=tree.fit_balanced,rf=rf.fit_balanced,lr=LogReg.fit_balanced,svmLinear = svm.fit_balanced, svmRadial = svmR.fit_balanced, MLP = mlp.fit_balanced))
summary(transformResults)
ggplot(transformResults, metric = c("Accuracy", "Kappa"), scales = "free") 


# ROC curve
suppressMessages({
  rocObj_lr <- roc(response = fTR_eval$Default, fTR_eval$LogReg_prob$YES)
  rocObj_tree <- roc(response = fTR_eval$Default, fTR_eval$tree_prob$YES)
  rocObj_rf <- roc(response = fTR_eval$Default, fTR_eval$rf_prob$YES)
  rocObj_knn <- roc(response = fTR_eval$Default, fTR_eval$knn_prob$YES)
  rocObj_svmL <- roc(response = fTR_eval$Default, fTR_eval$svm_prob$YES)
  rocObj_svmR <- roc(response = fTR_eval$Default, fTR_eval$svmR_prob$YES)
  rocObj_mlp <- roc(response = fTR_eval$Default, fTR_eval$mlp_prob$YES)
})

ggroc(list(decission_tree =rocObj_tree, Random_Forest=rocObj_rf, KNN =rocObj_knn, Logaristic_Regression=rocObj_lr, svm_linear = rocObj_svmL, svm_radial = rocObj_svmR, mlp = rocObj_mlp)) + 
  geom_abline(slope = 1, intercept = 1) + 
  labs(title = "ROC Curves for Training Set", 
       x = "Specificity", y = "Sensitivity")



# TEST ----------------------
# Overall accuracy
accuracyTsLR<- confusionMatrix(fTS_eval$LogReg_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsKnn <- confusionMatrix(fTS_eval$knn_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsTree <- confusionMatrix(fTS_eval$tree_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsRF <- confusionMatrix(fTS_eval$rf_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsSvmL <- confusionMatrix(fTS_eval$svm_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsSvmR <- confusionMatrix(fTS_eval$svmR_pred, fTS_eval$Default, positive = "YES")$overall[1]
accuracyTsMlp <- confusionMatrix(fTS_eval$mlp_pred, fTS_eval$Default, positive = "YES")$overall[1]

# Create data
data <- data.frame(
  name=c("LogReg","KNN","Tree","RF","SVMLinear","SVMRadial","Mlp") ,  
  value=c(accuracyTsLR,accuracyTsKnn,accuracyTsTree,accuracyTsRF,accuracyTsSvmL,accuracyTsSvmR,accuracyTsMlp)
)

ggplot(data, aes(x=name, y=value)) +
  geom_segment( aes(x=name, xend=name, y=0, yend=value), color="skyblue") +
  geom_point( color="blue", size=3, alpha=0.6) +
  geom_text(aes(label = round(value, 3), x = name, y = value+0.1), color = "black", size = 3) +
  theme_light() +
  coord_flip() +
  ylab("Test accuracy") +
  xlab("Model")+
  theme(
    panel.grid.major.y = element_blank(),
    panel.border = element_blank(),
    axis.ticks.y = element_blank()
  )


# ROC curve
suppressMessages({
  rocObj_LR <- roc(response = fTS_eval$Default, fTS_eval$LogReg_prob$YES)
  rocObj_tree <- roc(response = fTS_eval$Default, fTS_eval$tree_prob$YES)
  rocObj_rf <- roc(response = fTS_eval$Default, fTS_eval$rf_prob$YES)
  rocObj_knn <- roc(response = fTS_eval$Default, fTS_eval$knn_prob$YES)
  rocObj_svmL <- roc(response = fTS_eval$Default, fTS_eval$svm_prob$YES)
  rocObj_svmR <- roc(response = fTS_eval$Default, fTS_eval$svmR_prob$YES)
  rocObj_mlp <- roc(response = fTS_eval$Default, fTS_eval$mlp_prob$YES)
})
dev.off()


ggroc(list(decission_tree =rocObj_tree, Random_Forest =rocObj_rf,svm_linear = rocObj_svmL, svm_radial = rocObj_svmR, mlp = rocObj_mlp,KNN =rocObj_knn, Logaristic_Regression=rocObj_LR)) + 
  geom_abline(slope = 1, intercept = 1) + 
  labs(title = "ROC Curves for Test Set", 
       x = "Specificity", y = "Sensitivity")

