import os
from multiprocessing import Process, current_process

def square(number):
	result = number * number

	process_id = os.getpid()
	print(f"Process ID: {process_id}")
	print(f"The number {number} squares to {result}.")

if __name__ == '__main__':
	processes = []
	numbers = [1,2,3,4]

	for number in numbers:
		process = Process(target=square, args=(number,))
		processes.append(process)
		process.start()
