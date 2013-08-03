#!/usr/bin/python
from BaseHTTPServer import BaseHTTPRequestHandler, HTTPServer
from os import curdir, sep
import os

PORT_NUMBER = 8082
class myHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        mimetype='text/html'
        if self.path.endswith(".gif"):
                mimetype='image/gif'
        elif self.path.endswith(".jpg"):
                mimetype='image/jpg'
        elif self.path.endswith(".png"):
                mimetype='image/png'

        self.send_response(200)
        self.send_header('Content-type', mimetype)
        self.end_headers()

        if mimetype == 'text/html':
            f = open(curdir + '/html/top.html') 
            self.wfile.write(f.read())
            f.close()

            for pic in os.listdir(curdir + '/images/'):
                self.wfile.write('\t\t\t\t<section><img src="images/' + pic + '" /></section>\n')

            f = open(curdir + '/html/bottom.html')
            self.wfile.write(f.read())
            f.close()
        else:
            f = open(curdir + sep + self.path)
            self.wfile.write(f.read())
            f.close()
        return

try:
    server = HTTPServer(('', PORT_NUMBER), myHandler)
    print 'Started httpserver on port ' , PORT_NUMBER
    server.serve_forever()

except KeyboardInterrupt:
    print '^C received, shutting down the web server'
    server.socket.close()
