#!/bin/bash
rm bin/output
touch bin/output
g++ $1 -o out >& bin/output
string=$(cat bin/output)
if [ -n "$string"  ]; then
    echo '<h2 class="footHead" style="background-repeat:repeat;margin:5px;padding:10px;text-shadow: 1px 1px 2px #333;color:#cf0000;text-align:center;font-size:3em">Failure:</h2>'
    cat bin/output
else
    echo '<h2 class="footHead" style="background-repeat:repeat;margin:5px;padding:10px;text-shadow: 1px 1px 2px #333;color:#000066;text-align:center;font-size:3em">Success!</h2>'
    ./out $2
fi