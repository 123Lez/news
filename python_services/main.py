from DB_connection import database_connection
from autobahn.asyncio.websocket import WebSocketServerProtocol,WebSocketServerFactory
from websocket import MyServerProtocol
import asyncio
import pymysql
from realtimeupdates.General import General_Methods
from realtimeupdates.ScraperMethods import ScraperMethods
import threading
import multiprocessing

def sockets():

    factory = WebSocketServerFactory(u"ws://127.0.0.1:9000")
    factory.protocol = MyServerProtocol
    loop = asyncio.get_event_loop()
    coro = loop.create_server(factory, '0.0.0.0', 9000)
    server = loop.run_until_complete(coro)

    try:
        loop.run_forever()
    except KeyboardInterrupt:
        pass
    finally:
        server.close()
        loop.close()

def article_scraper():
    scraper = ScraperMethods(database_connection('localhost','root','','social_news_db'))

    build_sources = scraper.build_sources(scraper.sources())

    print(scraper.extracting_source(build_sources))


if __name__=='__main__':

    mysql = database_connection('localhost','root','','social_news_db')

    mysql.get_connection()
    # result = mysql.query_data('SELECT * FROM users')
    # # print(result)
    gm = General_Methods(mysql)
    print(gm.fetch_row())


    scraper = ScraperMethods(mysql)
    result = scraper.remove_duplicates()
    build_sources = scraper.build_sources(scraper.sources())

    print(scraper.extracting_source(build_sources))

    # WebSockets for future use
    # sockets_process = multiprocessing.Process(target=sockets)
    # sockets_process.start()
    scraper_process = multiprocessing.Process(target=article_scraper)
    scraper_process.start()



