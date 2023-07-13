import os

path = 'C:\wamp64\www\hostel management project\pictures'
i = 1 # initialize the counter

for filename in os.listdir(path):
    if filename.endswith('.txt'): # Change the file extension as needed
        new_filename = 'id_image{}.jpg'.format(i) # Use the counter to create a new filename
        i += 1 # Increment the counter for the next file
        os.rename(os.path.join(path, filename), os.path.join(path, new_filename)) # Rename the file
