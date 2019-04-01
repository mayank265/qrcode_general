i = 0
inp_file = 'list_keys_here.txt'
op_file = 'input_keys_to_qr_module.txt'

with open(op_file, 'w') as f:
	for line in open(inp_file, 'r'):
		line = line.rstrip()
		if i == 0:
			line = line + "," + line
			i += 1
		else:
			line = "\n" + line + "," + line
		f.write(line)