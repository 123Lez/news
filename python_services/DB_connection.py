import pymysql

class database_connection:
    def __init__(self,connection,user,password,database):
        self.conn = connection
        self.user = user
        self.password = password
        self.db_name = database
        self.connection = None

    def get_connection(self):
        self.connection = pymysql.connect(self.conn,self.user,self.password,self.db_name)
        cursor = self.connection.cursor()
        self.connection.commit()
        # return cursor

    def query_data(self, value, qry_values = ()):
        
        cursor = self.connection.cursor()
        cursor.execute(value,qry_values)

        cursor_result = cursor.fetchall()
        
        self.connection.commit()

        return cursor_result


    def disconnect(self):
        return self.connection.close()

    
        
