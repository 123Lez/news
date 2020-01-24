from DB_connection import database_connection
from realtimeupdates.ScraperMethods import ScraperMethods

class General_Methods:
	def __init__(self, mysql):

		self.mysql = mysql


	def fetch_row(self):
		replies = list()
		self.qry = 'SELECT * FROM users'
		self.qry_result = self.mysql.query_data(self.qry)

		if len(self.qry_result) > 0:
			for result in self.qry_result:
				
				replies.append({'id':result[0], 'name':result[1], 'lastname':result[2],'email':result[3]})

		return replies