i = 0
inp_file = 'keys.txt'
op_file = 'dupkeys.txt'

with open(op_file, 'w') as f:
	for line in open(inp_file, 'r'):
		line = line.rstrip()
		if i == 0:
			line = line + "," + line
			i += 1
		else:
			line = "\n" + line + "," + line
		f.write(line)