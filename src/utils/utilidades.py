import numpy as np
import pandas as pd

    
def mean_absolute_percentage_error(y_true, y_pred): 
    y_true, y_pred = np.array(y_true), np.array(y_pred)
    return np.mean(np.abs((y_true - y_pred) / y_true)) * 100


def clean_group_data(dataset, parameter, range_upper):
    q1, q3 = np.percentile(dataset[parameter],[25,75])
    iqr = q3 - q1
    lower_bound = 10
    upper_bound = q3 + range_upper*(1.5 * iqr)  

    # Deleting lower bound and upper bound from the dataset LinkTT2
    dataset = dataset.loc[(dataset[parameter] >= lower_bound) & 
                                              (dataset[parameter] <= upper_bound)]