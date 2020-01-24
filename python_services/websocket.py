from autobahn.asyncio.websocket import WebSocketServerProtocol,WebSocketServerFactory
from DB_connection import database_connection
from realtimeupdates.General import General_Methods
import json
class MyServerProtocol(WebSocketServerProtocol):
    def onConnect(self, request):
        print("Client connecting: {0}".format(request.peer))

    def onOpen(self):
        print("WebSocket connection open.")

    def onMessage(self, payload, isBinary):
        if isBinary:
            print("Binary message received: {0} bytes".format(len(payload)))
        else:
            print("Text message received: {0}".format(payload.decode('utf8')))

        # echo back message verbatim

        mysql = database_connection('localhost','root','123@lesego','social_news_db')

        mysql.get_connection()

        # result = mysql.query_data('SELECT * FROM users')
        # # print(result)
        gm = General_Methods(mysql)
        message = gm.fetch_row()

        obj = {'name':'Lesego', 'parameter':{'length':5,'module':'General_Methods'}}
        msg = bytes(json.dumps(message),'utf8')
        # response_bytes = bytes(json.dumps(client_remove_message), 'utf-8')

        self.sendMessage(msg, isBinary)
        # self.sendMessage(payload, isBinary)

    def onClose(self, wasClean, code, reason):
        print("WebSocket connection closed: {0}".format(reason))


# if __name__ == '__main__':
#     import asyncio
#     factory = WebSocketServerFactory(u"ws://127.0.0.1:9000")
#     factory.protocol = MyServerProtocol
#     loop = asyncio.get_event_loop()
#     coro = loop.create_server(factory, '0.0.0.0', 9000)
#     server = loop.run_until_complete(coro)
#     try:
#         loop.run_forever()
#     except KeyboardInterrupt:
#         pass
#     finally:
#         server.close()
#         loop.close()
        
        
