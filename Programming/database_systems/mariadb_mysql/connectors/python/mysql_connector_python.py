# Tutorial: https://dev.mysql.com/doc/connector-python/en/connector-python-introduction.html

import mysql.connector


# ---------- Instantiate connection to a database ----------
# Demonstration: Do not hardcode connection details. Instead put them in a configuration file
connection = mysql.connector.connect(user='<user>', password='<password>', host='<host>', database='<database>')
cursor = connection.cursor()


# ---------- Executing SQL-Statements ----------

# DDL-Statement
cursor.execute('<ddl_statement>')

# DML-Statement
cursor.execute('<dml_statement>')
connection.commit()

# DQL-Statement
cursor.execute('<dql_Statement>')

# Access DQL-result by tuple
for (attr_1, attr_2, attr_n) in cursor:
    #print(attr_1)
    pass

# Access DQL-result by index
for record in cursor:
    for i in range(0, len(record)):
        #print(record[i])
        pass


# ---------- Call stored procedure ---------

# Access output parameter
result = cursor.callproc('<procedure_name>', '(inparam_1, ..., inparam_n, (outparam_1, 'datatype'), ..., (output_param2, 'datatype')')
print(result['<index_outparam_1>'])

# Access result set
cursor.callproc('<procedure_name>', '(param_1, ..., param_n')
for result in cursor.stored_results():
  records = result.fetchall()
  for row in range(0, len(records)):
      for column in range(0, len(records[row])):
          print(records[row][column])


# ---------- Handle Database errors ----------
# https://dev.mysql.com/doc/connector-python/en/connector-python-api-errors.html
try:
    cursor.execute('<SQL-Statement>')
except mysql.connector.Error as err:
    if err.errno == errorcode.ER_TABLE_EXISTS_ERROR:
        pass

# ---------- End connection to database ----------
cursor.close()
connection.close()
