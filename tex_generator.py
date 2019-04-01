header = r'''\documentclass{article}
\usepackage[demo]{graphicx}
\usepackage{caption,subcaption}
\usepackage[left=1cm, right=2cm, top=1cm,bottom=1cm]{geometry}

\begin{document}
	\clearpage
'''

beginner = r'''	\begin{figure}[]
		\centering
'''

looper1 = r'''		\begin{subfigure}{0.19\textwidth}
			\centering
			\includegraphics[width = 3.2cm,height = 3.2cm]{'''

looper2 = r'''}
			\caption*{\large{\textbf{'''

looper3 = r'''}}}
		\end{subfigure}\hfil
'''

ender = r'''	\end{figure}

'''

footer = r'''\end{document}
'''

with open('generated_output.tex', 'w') as f:
	f.write(header)
	i = 0
	for line in open('k.txt', 'r'):
		if i == 0:
			f.write(beginner)
		line = line.rstrip()
		f.write(looper1)
		f.write(line)
		f.write(looper2)
		f.write(line)
		f.write(looper3)
		i += 1
		if i == 5:
			i = 0
			f.write(ender)
	if i != 0:
		f.write(ender)
	f.write(footer)