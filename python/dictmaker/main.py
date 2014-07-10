import re
def get_data(file):
	file.seek(0)
	array = []
	array = file.read().split(' ')
	array.sort()
	return array
def put_data(array, file):
	for each in array:
		file.write(each)
		file.write('\n')
def merge(array1, array2):
	for each in array2:
		if check(each) is True:
			if each not in array1:
				array1.append(each.lower())
	array1.sort()
	return array1
notallowed = ['/','.',',']
def check(word):
	array = re.findall('[\W]+', word)
	if (len(array)==0):
		return True
	else:
	 	return False
fn1 = raw_input("Enter the dictionary file's name: ")
fn2 = raw_input("Enter the source file's name: ")
print "Please wait... Processing the file now."
file1 = open(fn1)
file2 = open(fn2)
a=[]
b=[]
a=get_data(file1)
b=get_data(file2)
a=merge(a, b)
file1 = open(fn1, 'w')
put_data(a, file1)
print "All done!"
