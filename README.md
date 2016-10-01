This is nonfunctional at the moment*

It has worked precariously on Nitrous.io, in this PHP format.  I also have another <a href="HTTPS://github.com/Bango1999/Joel_Module">nonworking Node.js implementation</a> in another repository.

Utilizes bash and g++ to perform php CLI executions, namely compilation and execution of C++ files, which the user inputs the raw code for via a glorified textarea in their browser window.

Takes parameters at this point rather than asking the user for realtime stdin queries.

Rudimentary user system, registered users get features like code saving, and administrators have access to all code saved by everyone, not just registered users.  So IP addresses are logged with every code submission as well.

Requirements:
- PHP
- Bash
- g++
- mysql

Implements some third party libraries like CodeMirror to make a pretty textarea.

I have since lost the box I got it working on, So I don't have database schematics, but its pretty straightforward if you read kony.php theres a users table and a codes table with relevant fields.

Notably, all the C++ code submitted is gzip compressed into the codes table for blob storage and retrieval.
