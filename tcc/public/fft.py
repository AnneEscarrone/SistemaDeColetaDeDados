import numpy as np
from scipy.fftpack import rfft, irfft, fftfreq
ref_arquivo = open("fft/coordenadas.txt","r")
coordenadasX=[]
coordenadasY=[]
for linha in ref_arquivo:
		valores = linha.split()        
		coordenadasX.append(valores[0])
		coordenadasY.append(valores[1])
time   = np.linspace(0,10,2*len(coordenadasX))
signal=coordenadasX+coordenadasY 
print(len(coordenadasX))
f_signal=0
if len(coordenadasX) !=0:
	W = fftfreq(len(signal), d=time[1]-time[0])
	f_signal = np.sqrt(rfft(signal)**2)
	total=0
	for i in range(0,len(f_signal)):
			if (W[i]>1 and W[i]<6 and f_signal[i]>30000):
				total= total + f_signal[i]
	resultado=total/len(f_signal)
	#print(resultado)
	import pylab as plt
	#plt.subplot(121)
	#plt.plot(time,signal)
	#plt.subplot(122)
	#plt.plot(W,f_signal)
	#plt.xlim(0,14)
	#plt.ylim(0,50000)
	#plt.plot(coordenadasX, coordenadasY,"b")
	#plt.show()
else:
	resultado=0.0
arq = open('vetor.arff', 'a')
arq.write(','+str(resultado)+'\n')
arq.close()

