# import mysql.connector

# mydb = mysql.connector.connect(
#   host="localhost",
#   user="bchermsi",
#   password="50177BenC",
#   database="bchermsi"
# )

import pandas as pd
import sqlalchemy
import pymysql

# Read the CSV file into a Pandas DataFrame
df = pd.read_csv('Musium.csv')

# Create an SQLAlchemy engine to connect to the database
engine = sqlalchemy.create_engine('mysql+pymysql://bchermsi:50177BenC@localhost:3306/bchermsi')

# Write the DataFrame to the database
df.to_sql('museum', engine, index=False, if_exists='replace')

