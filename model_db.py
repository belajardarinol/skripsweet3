import mysql.connector
import MySQLdb.cursors
import pandas as pd
from flask import Flask, render_template, sessions, url_for, request, redirect, flash, jsonify
import json

def execute_query(query, db='sentimen', host_name='localhost', user_name='root', user_password=''):

    connection = mysql.connector.connect(
        host=host_name,
        user=user_name,
        password=user_password,
        database=db)
    print("MySQL Database connection successful")

    cursor = connection.cursor(buffered=True, dictionary=True)

    cursor.execute(query)
    connection.commit()
    result = cursor.fetchall()
    return pd.DataFrame(result)

def load_credentials():
    with open('credentials.json') as f:
        credentials = json.load(f)
        return credentials