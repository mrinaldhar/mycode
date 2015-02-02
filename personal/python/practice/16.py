from sys import argv
script, filename = argv
print "We are going to erase %r." % filename
print "Press enter to continue..."
raw_input('>')
target = open(filename, 'w')
target.truncate()
print "Enter new text..."
text = raw_input('>')
target.write(text)
target.close()

