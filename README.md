##      This is the HTTP API to store , retrieve and delete files.
        support the following features:
            - Upload a new file (if multiple files have similar contents, reuse the contents)
            - Retrieve an uploaded file by name
            - Delete an uploaded file by name


##     Installation
        git clone https://github.com/kareemesaam/kareemesaam-cloudvests_task-.git
        
I used the laravel sail to interacting with Laravel's default Docker development environment
try this to execute Sail's commands more easily:

       alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
       
then: 
       
       sail up 

##     Test
       Import cloudvests_task.postman_collection.json file to Postman and enjoy !

    
