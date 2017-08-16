# jpegif.uk
Image sharing website as a collaboration between the Booth-Clibborn and the Hill-Danial household 

REMEMBER:
When you commit, dump the table you have to the folder in the root directory.
When you pull from the git, import the dump in the folder to your table.
This is so dummy data is consistent across tests.

When we push this REMEMBER that the check for image filetype uses an abosloute path, beginning with http://localhost. When we push this, this should be changed so it checks both localhost and jpegif.co.uk so we can keep the file the same across local and remote servers.
