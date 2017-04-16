s = 'The username and password are what you would find at 40.4168 N, 3.7038 W and 33.5731 N, 7.5898 W'
rot = s.encode('rot13')
hx = rot.encode('hex')

for i in range(len(hx)/2):
	print bin(int(hx[:2],16))[2:].zfill(8),
	hx = hx[2:]
