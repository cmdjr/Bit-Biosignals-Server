import socket

# create socket address family IPv4 and TCP proticol
ip_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# bind socket to the port
server_address = ('192.168.0.99', 8085)
print 'Starting up on %s port %s' % server_address
ip_socket.bind(server_address)

# listen for incomming connections
ip_socket.listen(1)

# wait for a connection
print 'Waiting for a connection'

while True:
	# wait to accept connection
	connection, client_address = ip_socket.accept()
	print 'Connection from ', client_address

	# recieve the data
	data = connection.recv(1024)
	if data:
		print 'Receiving data...'
		fileNameEnd = data.find('\n')
		fileName = data[0:fileNameEnd]
		# open file
		print 'Saving to file ', fileName
		file = open('/home/pi/git/Bit-Biosignals-Server/www/data/' + fileName,'w')

		# write first chunk to file
		file.write(data[fileNameEnd+1:len(data)])

		while True:
			# write rest
			data = connection.recv(1024)

			if data:
				file.write(data)
			else:
				# end of file reached
				print 'Finished Rx data closing socket'
				# close file
				file.close()
				# close socket
				connection.close()
				break

