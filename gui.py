from os import remove
from flask import Flask, render_template, jsonify, request
import csv
from flask_mysqldb import MySQL
from flask_paginate import Pagination, get_page_args
import pymysql, os, csv, pickle, re, nltk, mysql.connector, MySQLdb.cursors, json
from flask import Flask, Markup, render_template, sessions, url_for, request, redirect, flash, jsonify, session

import pandas as pd
import re
import nltk
import csv
import matplotlib.pyplot as plt
import sklearn.svm

from nltk.corpus import stopwords
from nltk import word_tokenize
from nltk.stem import PorterStemmer
from nltk.stem import WordNetLemmatizer
from Sastrawi.Stemmer.StemmerFactory import StemmerFactory
import emoji

import string
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.model_selection import train_test_split
from sklearn.svm import LinearSVC
from nltk.classify import SklearnClassifier
from sklearn.svm import SVC
from sklearn.metrics import accuracy_score
from sklearn.metrics import confusion_matrix
from sklearn.metrics import classification_report

from ekstrak import split
from werkzeug.utils import redirect, secure_filename
from model_v2 import model_v2
from model_v3 import model_v3
from keras.models import model_from_json
from ekstrak import split
from model_db import execute_query

import pickle

import sys
import json
import base64

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

@app.route("/")
def main(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('index2.html')

@app.route("/user")
def user(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('user.html')

@app.route("/userklasifikasi")
def userklasifikasi(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('userklasifikasi.php')

@app.route("/userabout")
def userabout(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('userabout.html')

@app.route("/user_data_cek", methods=['GET', 'POST'])
def userCek():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM prep")
    rv = cur.fetchall()
    cur.close()
    return render_template('user_data_cek.php', data=rv)

@app.route("/usergallery")
def usergallery(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('usergallery.html')

@app.route('/userhasiluji', methods=["GET", 'POST'])
def userhasiluji(): 

    subject = request.args.get("sub")
    subject = [subject]
    
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO data_cek (sub) VALUES (%s)",(subject))
    mysql.connection.commit()
    flash("Add data cek success!", "success")
    
    result = {}

    def case_folding(tokens): 
        return tokens.lower()

    test_casefolding=[]
    for i in range(0, len(subject)):
        test_casefolding.append(case_folding(subject[i]))
        
    result['casefolding'] = ' '.join(list(map(lambda x: str(x), test_casefolding)))
    casefolding = result['casefolding']
    

    def remove_num(text):  
        text_nonum = ''
        text_nonum = re.sub(r'\d+',' ', text)
        return text_nonum
    
    test_removenum=[]
    for i in range(0,len(test_casefolding)):
        test_removenum.append(remove_num(test_casefolding[i]))

    result ['remove_num'] = ' '.join(list(map(lambda x: str(x), test_removenum)))
    removenum = result ['remove_num']
    

    def remove_punct(text):
        text_nopunct = ''
        text_nopunct = re.sub('['+string.punctuation+']', ' ', text)
        return text_nopunct
    
    test_removepunct=[]
    for i in range(0,len(test_removenum)):
	    test_removepunct.append(remove_punct(test_removenum[i]))
    
    result['removepunct'] = ' '.join(list(map(lambda x: str(x), test_removepunct)))
    removepunct = result['removepunct']
    
    def open_kamus_prepro(x):
        kamus={}
        with open(x,'r') as file :
            for line in file :
                slang=line.replace("'","").split(':')
                kamus[slang[0].strip()]=slang[1].rstrip('\n').lstrip()
        return kamus

    kamus_slang = open_kamus_prepro('Kamus spelling_word.txt')

    def slangword(text):
        sentence_list = text.split()
        new_sentence = []
        
        for word in sentence_list:
            for candidate_replacement in kamus_slang:
                if candidate_replacement == word:
                    word = word.replace(candidate_replacement, kamus_slang[candidate_replacement])
            new_sentence.append(word)
        return " ".join(new_sentence)

    test_slangword=[]
    for i in range(0,len(test_removepunct)):
        test_slangword.append(slangword(test_removepunct[i]))

    slangword_ = test_slangword

    result['hasil_token'] = [word_tokenize(sen) for sen in test_slangword]
    hasil_token = result['hasil_token']
    

    kamus_stopword=[]
    with open('Kamus stopword.txt','r') as file :
        for line in file :
            slang=line.replace("'","").strip()
            kamus_stopword.append(slang)
            
    def remove_stop_words(tokens):
        return [word for word in tokens if word not in kamus_stopword]

    stopword= [remove_stop_words(sen) for sen in hasil_token] 

    result['remove_stop_words'] = ' '.join(list(map(lambda x: str(x), stopword)))
    remove_stop_words = result['remove_stop_words']


    factory = StemmerFactory()
    stemmer = factory.create_stemmer()
    
    def stemming(tokens):  
        data_stem =[]
        for i in tokens:
            kata = stemmer.stem(i)
            data_stem.append(kata)
        return data_stem

    stem=[]
    for i in range(0,len(stopword)):
        stem.append(stemming(stopword[i]))

    result['stemming'] = ' '.join(list(map(lambda x: str(x), stem)))
    stemming_ = result['stemming']

    kamus_qe = open_kamus_prepro('Kamus QE.txt')
    
    
    def qe(text):  
        sentence_list = text
        new_sentence = []
        for word in sentence_list:
            for candidate_replacement in kamus_qe:
                if candidate_replacement == word:
                    word = word.replace(candidate_replacement, kamus_qe[candidate_replacement])
            new_sentence.append(word)
        return new_sentence

    test_qe=[]
    for i in range(0,len(stem)):
        test_qe.append(qe(stem[i]))

    qe_ = test_qe

    result['qe'] = ' '.join(list(map(lambda x: str(x), test_qe)))
    qe_ = result['qe']
    
   
    text_final = [' '.join(sen) for sen in test_qe]

    result['text_final'] = [' '.join(sen) for sen in test_qe]
    text_final_ = result['text_final']
    
    
    vectorizer = pickle.load(open("model_tfidf_5.pickle",'rb'))
    loaded_model = pickle.load(open("model_svm_5.pickle", 'rb'))

    vect = vectorizer.transform(text_final)[0]
    prediksisvm = loaded_model.predict(vect)[0]

    result['probabilitassvm']= loaded_model.predict_proba(vect)[0]
    probabilitassvm_ = result['probabilitassvm']
    

    result['probabilitassvm_new'] = "[Negatif : {:.2f}] -- \n[Positif : {:.2f}] -- \n[Netral : {:.2f}]".format(probabilitassvm_[0], probabilitassvm_[-1], probabilitassvm_[1])
    probabilitassvmm = result['probabilitassvm_new']
    
    
    result['predict'] = 'Negatif' if prediksisvm == -1 else 'Positif' if prediksisvm == 1 else 'Netral'
    hasil_kelas = result['predict']
    
   
    vectorizer_nonqe = pickle.load(open("nonqe_model_tfidf_1.pickle",'rb'))
    loaded_model_nonqe = pickle.load(open("nonqe_model_svm_1.pickle", 'rb'))

    vect_nonqe = vectorizer_nonqe.transform(text_final)[0]
    prediksisvm_nonqe = loaded_model_nonqe.predict(vect_nonqe)[0]

    result['probabilitassvm_nonqe']= loaded_model_nonqe.predict_proba(vect_nonqe)[0]
    probabilitassvm_nonqe_ = result['probabilitassvm_nonqe']
    
    
    
    result['probabilitassvmnonqe'] = "[Negatif : {:.2f}] -- \n[Positif : {:.2f}] -- \n[Netral : {:.2f}]".format(probabilitassvm_nonqe_[0], probabilitassvm_nonqe_[-1], probabilitassvm_nonqe_[1])
    probabilitassvmnonqe_ = result['probabilitassvmnonqe']
    
    
    result['predict_nonqe'] = 'Negatif' if prediksisvm_nonqe == -1 else 'Positif' if prediksisvm_nonqe == 1 else 'Netral'
    hasil_kelas_nonqe = result['predict_nonqe']
    
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO prep (subject,casefolding,removepunct,slangword_, remove_stop_words,stemming_,qe_,text_final_,probabilitassvmm,hasil_kelas,probabilitassvm_nonqe_,probabilitassvmnonqe_,hasil_kelas_nonqe) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(subject,test_casefolding,test_removepunct,test_slangword,remove_stop_words,stemming_,qe_,text_final_,probabilitassvmm,hasil_kelas,probabilitassvm_nonqe_,probabilitassvmnonqe_,hasil_kelas_nonqe))
    mysql.connection.commit()
    flash("Add data cek success!", "success")

    
    return render_template("userhasiluji.html", 
                                subject = subject,
                                casefolding = casefolding, 
                                removepunct = removepunct,
                                removenum = removenum,
                                slangword_ = slangword_,
                                hasil_token = hasil_token,
                                remove_stop_words = remove_stop_words,
                                stemming_ = stemming_,
                                qe_ = qe_,
                                text_final_= text_final_,
                                probabilitassvmm = probabilitassvmm,
                                hasil_kelas = hasil_kelas,
                                probabilitassvm_nonqe_ = probabilitassvm_nonqe_,
                                probabilitassvmnonqe_ = probabilitassvmnonqe_,
                                hasil_kelas_nonqe = hasil_kelas_nonqe
                                ) 

#@app.route("/input2", methods=['GET', 'POST'])
#def input2():   
 #   with open('datamurnii.csv', encoding= 'unicode_escape') as csv_file:
  #      data = csv.reader(csv_file, delimiter=',')
   #     first_line = True
    #    dataset = []
     #   for row in data:
      #      if not first_line:
       #         dataset.append({
        #        "name": row[0],
         #       "comment": row[1],
               # "Label": row[2],
          #      })
           # else:
            #    first_line = False
    #return render_template('input2.html', menu='input2', submenu='data', dataset=dataset)
    
@app.route('/login2', methods=['GET', 'POST'])
def login2():
    # Check if "username" and "password" POST requests exist (user submitted form)
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        # Create variables for easy access
        username = request.form['username']
        password = request.form['password']
        # cur = mysql.connection.cursor()
        cur = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cur.execute('SELECT * FROM admin WHERE username = %s AND password = %s', (username, password,))
        # Fetch one record and return result
        account = cur.fetchone()
        # If account exists in accounts table in out database
        if account:
            # Create session data, we can access this data in other routes
            session['loggedin'] = True
            session['id_admin'] = account['id_admin']
            session['username'] = account['username']
 
            flash("Login Success!", "success")
            return redirect(url_for('main'))
        else:
            flash("Invalid username or password!", "warning")
        return render_template('login.html')
        
@app.route("/login", methods=['GET', 'POST'])
def login(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('login.html')

@app.route('/logout')
def logout():
    # Remove session data, this will log the user out
   session.pop('loggedin', None)
   session.pop('id_admin', None)
   session.pop('username', None)
   flash('You were logged out')
   # Redirect to login page
   return redirect(url_for('login'))

@app.route("/gallery")
def gallery(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('gallery.html')

@app.route("/input2", methods=['GET', 'POST'])
def input2():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM data_mentah")
    rv = cur.fetchall()
    cur.close()
    return render_template('input2.html', data=rv)

@app.route('/update_mentah', methods=['POST'])
def updateMentah():
    id_mentah = request.form['id_mentah']
    user = request.form['username']
    com = request.form['comment']
    lab = request.form['Label']
    cur = mysql.connection.cursor()
    cur.execute("UPDATE data_mentah SET username=%s, comment=%s, Label=%s WHERE id_mentah=%s ", (user,com,lab,id_mentah,) )
    mysql.connection.commit()
    flash("Update data mentah success!", "success")
    return redirect(url_for('input2')) 

@app.route('/hapus_mentah/<id_mentah>', methods=['GET'])
def hapusMentah(username):
    cur = mysql.connection.cursor()
    cur.execute("DELETE FROM data_mentah WHERE username=%s", [username])
    mysql.connection.commit()
    flash("Delete data mentah success!", "danger")
    return redirect(url_for('input2'))

@app.route("/page_admin", methods=['GET', 'POST'])
def admin():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM admin")
    rv = cur.fetchall()
    cur.close()
    return render_template('admin.php', data=rv)

@app.route('/add_admin', methods=['GET', 'POST'])
def insertAdmin():
    id_admin = request.form['id_admin']
    username = request.form['username']
    password = request.form['password']
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO admin (id_admin, username, password) VALUES (%s,%s,%s)",(id_admin,username,password))
    mysql.connection.commit()
    flash("Add data admin success!", "success")
    return redirect(url_for('admin'))

@app.route('/page_data_admin', methods=['GET', 'POST'])
def dataAdmin():
   # def page_data_admin():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM admin")
    rv = cur.fetchall()
    cur.close()
    return render_template('page_data_admin.php', data=rv)

@app.route('/updateAdmin', methods=['POST'])
def updateAdmin():
    id = request.form['id_admin']
    user = request.form['username']
    pwd = request.form['password']
    cur = mysql.connection.cursor()
    cur.execute("UPDATE admin SET username=%s, password=%s WHERE id_admin=%s ", (user,pwd,id,) )
    mysql.connection.commit()
    flash("Update data admin success!", "success")
    return redirect(url_for('admin')) 

# string:id_admin
@app.route('/hapus_admin/<id_admin>', methods=['GET'])
def hapusAdmin(id_admin):
    cur = mysql.connection.cursor()
    cur.execute("DELETE FROM admin WHERE id_admin=%s", [id_admin])
    mysql.connection.commit()
    flash("Delete data admin success!", "danger")
    return redirect(url_for('admin'))

@app.route('/prosesadmin', methods=['GET', 'POST'])
def prosesadmin():
    return render_template('prosesadmin.php')

@app.route("/about")
def about():
    return render_template('about.html')

@app.route("/page_klasifikasi")
def page_klasifikasi():
    return render_template('page_klasifikasi.php')

@app.route("/page_data_cek", methods=['GET', 'POST'])
def dataCek():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM prep")
    rv = cur.fetchall()
    cur.close()
    return render_template('page_data_cek.php', data=rv)

@app.route("/data_cek", methods=['GET', 'POST'])
def Cek():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM prep")
    rv = cur.fetchall()
    cur.close()
    return render_template('page_data_cek.php', data=rv)

@app.route('/addtomaster', methods=["GET", 'POST'])
def addtomaster(): 

    username = request.form['username']
    subject = request.form['subject']
    hasil_kelas = request.form['hasil_kelas']
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO data_mentah (username,comment,Label) VALUES (%s,%s,%s)",(username,subject,hasil_kelas,))
    mysql.connection.commit()
    
    return redirect(url_for('dataCek'))

@app.route('/update_cek', methods=['GET', 'POST'])
def updateCek():
    id = request.form['id']
    subject = request.form['subject']
    cur = mysql.connection.cursor()
    cur.execute("UPDATE prep SET subject=%s WHERE id=%s ", (subject,id,) )
    mysql.connection.commit()
    flash("Update data cek success!", "success")
    return redirect(url_for('dataCek')) 

@app.route('/hapus_cek/<id>', methods=['GET'])
def hapusCek(id):
    cur = mysql.connection.cursor()
    cur.execute("DELETE FROM prep WHERE id=%s", [id])
    mysql.connection.commit()
    flash("Delete data mentah success!", "danger")
    return redirect(url_for('dataCek'))

@app.route('/view_cek', methods=['POST'])
def viewCek():
    id_mentah = request.form['id_mentah']
    user = request.form['username']
    com = request.form['comment']
    lab = request.form['Label']
    cur = mysql.connection.cursor()
    cur.execute("UPDATE data_mentah SET username=%s, comment=%s, Label=%s WHERE id_mentah=%s ", (user,com,lab,id_mentah,) )
    mysql.connection.commit()
    flash("Update data mentah success!", "success")
    return redirect(url_for('dataCek'))

@app.route('/data_pengujian', methods=['GET', 'POST'])
def dataPengujian():
    #cur = mysql.connection.cursor()
    #cur.execute("SELECT * FROM pengujian ORDER BY id_uji DESC")
    #rv = cur.fetchall()
    #cur.close()
    #return render_template('pengujian.php', data=rv)
    return render_template('pengujian.php')

@app.route("/pengujian2")
def pengujian2(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('pengujian2.php')

@app.route("/pengujian3")
def pengujian3(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('pengujian3.php')

@app.route("/pengujian")
def pengujian(): #fungsi yang akan dijalankan ketike route dipanggil
    return render_template('pengujian.php')

@app.route('/hapus_pengujian/<id>', methods=['GET'])
def hapusPengujian(id):
    cur = mysql.connection.cursor()
    cur.execute("DELETE FROM pengujian WHERE id_uji=%s", [id])
    mysql.connection.commit()
    return redirect(url_for('dataPengujian'))

@app.route('/data_hasil_uji', methods=['GET', 'POST'])
def dataHasilUji():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM hasil_uji ORDER BY id_tesmodel DESC")
    rv = cur.fetchall()
    cur.close()
    return render_template('page_data_hasil_prediksi.php', data=rv)


@app.route("/grfk")
def grfk():
    return render_template('grfk.html')

@app.route("/inputdatauji")
def inputdatauji():
    return render_template('inputdatauji.html')  


@app.route('/hasiluji', methods=["GET", 'POST'])
def hasiluji(): 

    subject = request.args.get("sub")
    subject = [subject]
    
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO data_cek (sub) VALUES (%s)",(subject))
    mysql.connection.commit()
    flash("Add data cek success!", "success")
    
    result = {}

    def case_folding(tokens): 
        return tokens.lower()

    test_casefolding=[]
    for i in range(0, len(subject)):
        test_casefolding.append(case_folding(subject[i]))
        
    result['casefolding'] = ' '.join(list(map(lambda x: str(x), test_casefolding)))
    casefolding = result['casefolding']
    

    def remove_num(text):  
        text_nonum = ''
        text_nonum = re.sub(r'\d+',' ', text)
        return text_nonum
    
    test_removenum=[]
    for i in range(0,len(test_casefolding)):
        test_removenum.append(remove_num(test_casefolding[i]))

    result ['remove_num'] = ' '.join(list(map(lambda x: str(x), test_removenum)))
    removenum = result ['remove_num']
    

    def remove_punct(text):
        text_nopunct = ''
        text_nopunct = re.sub('['+string.punctuation+']', ' ', text)
        return text_nopunct
    
    test_removepunct=[]
    for i in range(0,len(test_removenum)):
	    test_removepunct.append(remove_punct(test_removenum[i]))
    
    result['removepunct'] = ' '.join(list(map(lambda x: str(x), test_removepunct)))
    removepunct = result['removepunct']
    
    def open_kamus_prepro(x):
        kamus={}
        with open(x,'r') as file :
            for line in file :
                slang=line.replace("'","").split(':')
                kamus[slang[0].strip()]=slang[1].rstrip('\n').lstrip()
        return kamus

    kamus_slang = open_kamus_prepro('Kamus spelling_word.txt')

    def slangword(text):
        sentence_list = text.split()
        new_sentence = []
        
        for word in sentence_list:
            for candidate_replacement in kamus_slang:
                if candidate_replacement == word:
                    word = word.replace(candidate_replacement, kamus_slang[candidate_replacement])
            new_sentence.append(word)
        return " ".join(new_sentence)

    test_slangword=[]
    for i in range(0,len(test_removepunct)):
        test_slangword.append(slangword(test_removepunct[i]))

    slangword_ = test_slangword

    result['hasil_token'] = [word_tokenize(sen) for sen in test_slangword]
    hasil_token = result['hasil_token']
    

    kamus_stopword=[]
    with open('Kamus stopword.txt','r') as file :
        for line in file :
            slang=line.replace("'","").strip()
            kamus_stopword.append(slang)
            
    def remove_stop_words(tokens):
        return [word for word in tokens if word not in kamus_stopword]

    stopword= [remove_stop_words(sen) for sen in hasil_token] 

    result['remove_stop_words'] = ' '.join(list(map(lambda x: str(x), stopword)))
    remove_stop_words = result['remove_stop_words']


    factory = StemmerFactory()
    stemmer = factory.create_stemmer()
    
    def stemming(tokens):  
        data_stem =[]
        for i in tokens:
            kata = stemmer.stem(i)
            data_stem.append(kata)
        return data_stem

    stem=[]
    for i in range(0,len(stopword)):
        stem.append(stemming(stopword[i]))

    result['stemming'] = ' '.join(list(map(lambda x: str(x), stem)))
    stemming_ = result['stemming']

    kamus_qe = open_kamus_prepro('Kamus QE.txt')
    
    
    def qe(text):  
        sentence_list = text
        new_sentence = []
        for word in sentence_list:
            for candidate_replacement in kamus_qe:
                if candidate_replacement == word:
                    word = word.replace(candidate_replacement, kamus_qe[candidate_replacement])
            new_sentence.append(word)
        return new_sentence

    test_qe=[]
    for i in range(0,len(stem)):
        test_qe.append(qe(stem[i]))

    qe_ = test_qe

    result['qe'] = ' '.join(list(map(lambda x: str(x), test_qe)))
    qe_ = result['qe']
    
   
    text_final = [' '.join(sen) for sen in test_qe]

    result['text_final'] = [' '.join(sen) for sen in test_qe]
    text_final_ = result['text_final']
    
    
    vectorizer = pickle.load(open("model_tfidf_5.pickle",'rb'))
    loaded_model = pickle.load(open("model_svm_5.pickle", 'rb'))

    vect = vectorizer.transform(text_final)[0]
    prediksisvm = loaded_model.predict(vect)[0]

    result['probabilitassvm']= loaded_model.predict_proba(vect)[0]
    probabilitassvm_ = result['probabilitassvm']
    

    result['probabilitassvm_new'] = "[Negatif : {:.2f}] -- \n[Positif : {:.2f}] -- \n[Netral : {:.2f}]".format(probabilitassvm_[0], probabilitassvm_[-1], probabilitassvm_[1])
    probabilitassvmm = result['probabilitassvm_new']
    
    
    result['predict'] = 'Negatif' if prediksisvm == -1 else 'Positif' if prediksisvm == 1 else 'Netral'
    hasil_kelas = result['predict']
    
   
    vectorizer_nonqe = pickle.load(open("nonqe_model_tfidf_1.pickle",'rb'))
    loaded_model_nonqe = pickle.load(open("nonqe_model_svm_1.pickle", 'rb'))

    vect_nonqe = vectorizer_nonqe.transform(text_final)[0]
    prediksisvm_nonqe = loaded_model_nonqe.predict(vect_nonqe)[0]

    result['probabilitassvm_nonqe']= loaded_model_nonqe.predict_proba(vect_nonqe)[0]
    probabilitassvm_nonqe_ = result['probabilitassvm_nonqe']
    
    
    
    result['probabilitassvmnonqe'] = "[Negatif : {:.2f}] -- \n[Positif : {:.2f}] -- \n[Netral : {:.2f}]".format(probabilitassvm_nonqe_[0], probabilitassvm_nonqe_[-1], probabilitassvm_nonqe_[1])
    probabilitassvmnonqe_ = result['probabilitassvmnonqe']
    
    
    result['predict_nonqe'] = 'Negatif' if prediksisvm_nonqe == -1 else 'Positif' if prediksisvm_nonqe == 1 else 'Netral'
    hasil_kelas_nonqe = result['predict_nonqe']
    
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO prep (subject,casefolding,removepunct,slangword_, remove_stop_words,stemming_,qe_,text_final_,probabilitassvmm,hasil_kelas,probabilitassvm_nonqe_,probabilitassvmnonqe_,hasil_kelas_nonqe) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",(subject,test_casefolding,test_removepunct,test_slangword,remove_stop_words,stemming_,qe_,text_final_,probabilitassvmm,hasil_kelas,probabilitassvm_nonqe_,probabilitassvmnonqe_,hasil_kelas_nonqe))
    mysql.connection.commit()
    flash("Add data cek success!", "success")

    
    return render_template("hasiluji.html", 
                                subject = subject,
                                casefolding = casefolding, 
                                removepunct = removepunct,
                                removenum = removenum,
                                slangword_ = slangword_,
                                hasil_token = hasil_token,
                                remove_stop_words = remove_stop_words,
                                stemming_ = stemming_,
                                qe_ = qe_,
                                text_final_= text_final_,
                                probabilitassvmm = probabilitassvmm,
                                hasil_kelas = hasil_kelas,
                                probabilitassvm_nonqe_ = probabilitassvm_nonqe_,
                                probabilitassvmnonqe_ = probabilitassvmnonqe_,
                                hasil_kelas_nonqe = hasil_kelas_nonqe
                                ) 

@app.route('/master_data', methods=['GET', 'POST'])
def dataMaster():
    cur = mysql.connection.cursor()
    try:
        if request.method == 'POST':
            draw = request.form['draw'] 
            row = int(request.form['start'])
            rowperpage = int(request.form['length'])
            searchValue = request.form["search[value]"]
            print('draw:',draw)
            print('row:',row)
            print('row per page:',rowperpage)
            print('search:',searchValue)
            
            cur.execute("select count(review) from tbl_master")
            sql=cur.fetchone()
            print(sql)

            totalRecords = sql
            print('c')
            print('records:', totalRecords) 
            cur.execute("select * from tbl_master limit %s, %s", (row, rowperpage))
            employeelist = cur.fetchall()
            data = []
            
            for row in employeelist:
                data.append({
                    'id' : row[0],
                    # 'id' : row[1],
                    'review' : row[1],
                    'label' : row[2]
                })
 
            response = {
                "draw" : draw,
                "iTotalRecords" : totalRecords,
                # "iTotalDisplayRecords" : totalRecordwithFilter,
                "aaData" : data,
            }
            return jsonify(response)
    except Exception as e:
        print(e)
    finally:
        cur.close() 
    return render_template('page_data_master.php')

@app.route('/add_data', methods=['GET', 'POST'])
def addMaster():
    username = request.form['username']
    comment = request.form['comment']
    Label = request.form['Label']
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO data_mentah (username,comment,Label) VALUES (%s,%s,%s)",(username,comment,Label,))
    mysql.connection.commit()
    return redirect(url_for('input2'))

@app.route('/datalatih', methods=['GET', 'POST'])
def dataLatih():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM tbl_train ORDER BY id_train DESC")
    rv = cur.fetchall()
    cur.close()
    return render_template('page_data_latih.php', data=rv)

@app.route('/editlatih', methods=['POST'])
def editLatih():
    id_train = request.form['id_train']
    #id_mentah = request.form['id_mentah']
    comment = request.form['comment']
    label = request.form['label']
    #Label = request.form['Label']
    cur = mysql.connection.cursor()
    cur.execute( "UPDATE tbl_train SET comment=%s, label=%s WHERE id_train=%s ", (comment,label,id_train,))
    #cur.execute("UPDATE data_mentah SET comment=%s, Label=%s WHERE id_mentah=%s ", (comment,Label,id_mentah,))
    mysql.connection.commit()
    flash("Update data training success!", "success")
    return redirect(url_for('dataLatih')) 

@app.route('/hapuslatih/<id_train>,<id>', methods=['GET'])
def hapusLatih(id_train,id):
    id_mentah = request.args.get("id_mentah")
    cur = mysql.connection.cursor()
    cur.execute("DELETE FROM tbl_train WHERE id_train=%s", [id_train])
    cur.execute("DELETE FROM data_mentah WHERE id_mentah=%s", [id_mentah])
    mysql.connection.commit()
    flash("Delete data training success!", "danger")
    return redirect(url_for('dataLatih'))

@app.route('/add_latih', methods=['GET', 'POST'])
def addLatih():
    username = request.form['username']
    comment = request.form['comment']
    Label = request.form['Label']
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO data_mentah (username,comment,Label) VALUES (%s,%s,%s)",(username,comment,Label,))  #insert ke db master dulu
    get_id = cur.lastrowid
    id_mentah = str(get_id)
    print(id_mentah) 
    cur.execute("INSERT INTO tbl_train (username,comment,label) SELECT username,comment,Label FROM data_mentah WHERE id_mentah='"+id_mentah+"' ")   #insert ke db train
    mysql.connection.commit()
    flash("Add data training success!", "success")
    return redirect(url_for('dataLatih'))

@app.route('/datauji', methods=['GET', 'POST'])
def dataUji():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM tbl_test ORDER BY id_test DESC")
    rv = cur.fetchall()
    cur.close()
    return render_template('page_data_uji.php', data=rv)

@app.route('/edituji', methods=['POST'])
def editUji():
    id_test = request.form['id_test']
    id_mentah = request.form['id_mentah']
    comment = request.form['comment']
    label = request.form['label']
    Label = request.form['Label']
    cur = mysql.connection.cursor()
    cur.execute( "UPDATE tbl_test SET comment=%s, label=%s WHERE id_test=%s ", (comment,label,id_test,))
    cur.execute("UPDATE data_mentah SET review=%s, Label=%s WHERE id_mentah=%s ", (comment,Label,id_mentah,))
    mysql.connection.commit()
    flash("Update data testing success!", "success")
    return redirect(url_for('dataUji')) 

@app.route('/hapusuji/<id_test>,<id_mentah>', methods=['GET'])
def hapusUji(id_test,id_mentah):
    id_mentah = request.args.get("id_mentah")
    cur = mysql.connection.cursor()
    cur.execute("DELETE FROM tbl_test WHERE id_test=%s", [id_test])
    cur.execute("DELETE FROM data_mentah WHERE id_mentah=%s", [id_mentah])
    mysql.connection.commit()
    flash("Delete data testing success!", "danger")
    return redirect(url_for('dataUji'))

@app.route('/add_uji', methods=['GET', 'POST'])
def addUji():
    username = request.form['username']
    comment = request.form['comment']
    Label = request.form['Label']
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO data_mentah (username,comment,Label) VALUES (%s,%s,%s)",(username,comment,Label,))  #insert ke db master dulu
    get_id = cur.lastrowid
    id_mentah = str(get_id)
    print(id) 
    cur.execute("INSERT INTO tbl_test (username,comment,label) SELECT username,comment,Label FROM data_mentah WHERE id_mentah='"+id_mentah+"' ")   #insert ke db train
    mysql.connection.commit()
    flash("Add data testing success!", "success")
    return redirect(url_for('dataUji'))

@app.route('/model_versi_2', methods=['GET','POST'])
def modelV2():
    kernel = request.form['kernel']
    print("model proses")
    model_v2(kernel)
    return redirect(url_for('dataPengujian'))

@app.route('/model_versi_3', methods=['GET','POST'])
def modelV3():
    kernel = request.form['kernel']
    print("model proses")
    model_v3(kernel)
    return redirect(url_for('dataPengujian'))

@app.route('/ekstrak_data', methods=['GET', 'POST'])
def ekstrak():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM data_master")
    with open("data_from_db.csv", "w", encoding='utf-8', newline='') as csv_file:  # Python 3 version    
        csv_writer = csv.writer(csv_file)
        csv_writer.writerow([i[0] for i in cur.description]) # write headers
        csv_writer.writerows(cur)
    print('Done')
    cur.close()
    return redirect(url_for('dataMaster'))

@app.route('/splitdata')
def splitData():
    split()
    return redirect(url_for('dataLatih'))

def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSION

@app.route('/import_data', methods=['GET', 'POST'])
def uploadFile():
    if request.method == 'POST':
        file = request.files['file']

        if 'file' not in request.files:
            # flash('No file part')
            return redirect(request.url)

        if file.filename == '':
            # flash('No selected file')
            return redirect(request.url)

        if file and allowed_file(file.filename):
            filename = secure_filename(file.filename)
            file_path = os.path.join(app.config['UPLOAD_FOLDER'], filename)
            file.save(file_path)
            parseCSV(file_path)   #ini kalau mau dimasukin ke database aja
            print("save data to db")
            # file.save(file_path)
            # file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))            
            return redirect(url_for('dataMaster'))
            
    return redirect(url_for('dataMaster'))

#import tabel tes
def parseCSV(filePath):
      # CVS Column Names
      col_names = ['username', 'subject', 'Label']
      # Use Pandas to parse the CSV file
      csvData = pd.read_csv(filePath,names=col_names, header=None)
      # Loop through the Rows
      for i,row in csvData.iterrows():
            cur = mysql.connection.cursor()
            sql = "INSERT INTO data_master (username, subject, Label) VALUES (%s, %s, %s)"
            value = (row['username'], row['subject'], row['Label'])
            cur.execute(sql, value)
            mysql.connection.commit()


if __name__ == "__main__":
   # app.secret_key = 'super secret key'
  #  app.config['SESSION_TYPE'] = 'filesystem'

   

    app.debug = True
    app.run()
    app.run(debug= True)