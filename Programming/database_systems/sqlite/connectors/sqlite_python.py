import sqlite3
#https://docs.python.org/3/library/sqlite3.html


def printUsers():
    result = cursor.execute('Select * from user;')
    print('registered users:')
    for row in result:
        print(row)
    print('\n')


def addUser(password):
    result = cursor.execute('Select max(id)+1 as uid from user;')
    login = 'user_' + str(result.fetchone()[0])
    cursor.execute('Insert into user(login, password) values (?,?)', (login, password))
    print('User added: ' + login + '\n')


def readPassword():
    input_1 = '';
    input_2 = '';
    while True:
        input_1 = input('Please enter your password: ')
        input_2 = input('Please repeat your password: ')
        if (input_1 == input_2):
            return input_1
        else:
            print('Passwords do not match. Please try again.')



connection = sqlite3.connect('../database/database_test.db')
cursor = connection.cursor()

print('''Commands\nl: list registered users\na: add user\nq: quit\n''')
while True:
    user_input = input(': ')
    if user_input == 'l':
        printUsers()
    elif user_input == 'a':
        addUser(readPassword())
    elif user_input == 'q':
        break
    else:
        print('invalid command')

connection.commit()
connection.close()
