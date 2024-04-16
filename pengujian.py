from os import remove
from flask import Flask, render_template, jsonify, request
import csv
from flask_mysqldb import MySQL
from flask_paginate import Pagination, get_page_args
import pymysql, os, csv, pickle, re, nltk, mysql.connector, MySQLdb.cursors, json
from flask import Flask, Markup, render_template, sessions, url_for, request, redirect, flash, jsonify, session

from flask import Flask, render_template, url_for
import numpy as np
import pandas as pd
import csv
import matplotlib.pyplot as plt
from sklearn import model_selection
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.feature_extraction.text import HashingVectorizer
from sklearn import svm
from sklearn.metrics import accuracy_score

# Packages for visuals
import matplotlib.pyplot as plt
import seaborn as sns; sns.set(font_scale=1.2)

app = Flask(__name__)

app.config['SECRET_KEY'] = 'super secret key'

#uploud dataset
ALLOWED_EXTENSION = set(['csv', 'xls', 'xlsx', 'txt'])
app.config['UPLOAD_FOLDER'] = 'data'
#db = mysql.connector.connect(
 # host="127.0.0.1",
 # user="root",
 # password="12345678",
 # database="sentimen"
#)

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = '12345678'
app.config['MYSQL_DB'] = 'sentimen'
mysql = MySQL(app)


def pengujian():
# Load Data
    data = pd.read_csv(r'datafix.csv')
    print(data)
    data = data.dropna()
    data.dropna()
    data.isna().any()

# Split into train and test data
    train_X, test_X, train_Y, test_Y = model_selection.train_test_split(data['comment'], data['Label'], test_size = 0.1, random_state = 0)
# random_state = 0 menyatakan tidak ada pengacakan pada data yang di split yang artinya urutannya masih sama

    df_train90 = pd.DataFrame()
#df_train90['username'] = train_X
    df_train90['comment'] = train_X
    df_train90['Label'] = train_Y

    df_test10 = pd.DataFrame()
    #df_test10['username'] = test_X
    df_test10['comment'] = test_X
    df_test10['Label'] = test_Y

    df_train90
    df_test10

    # TF-IDF
    from sklearn.feature_extraction.text import TfidfVectorizer
    tfidf_vect_9010 = TfidfVectorizer(max_features = 5000)
    tfidf_vect_9010.fit(data['comment'])
    train_X_tfidf_9010 = tfidf_vect_9010.transform(df_train90['comment'])
    test_X_tfidf_9010 = tfidf_vect_9010.transform(df_test10['comment'])

    tfidf_vect_9010
    print(train_X_tfidf_9010)
    print(test_X_tfidf_9010)

    print(train_X_tfidf_9010.shape)
    print(test_X_tfidf_9010.shape)

    # You can use the below syntax to see the vocabulary that it has learned from the corpus
    print(tfidf_vect_9010.vocabulary_)

