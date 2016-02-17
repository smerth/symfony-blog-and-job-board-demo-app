Symfony Demo
========================

# About

This project started out as a study site for Symfony based on the Symfony Demo installation.  Then a job-board was added based on the Jobeet tutorial. 

Each App has its own folder:

- Symfony Demo -> `src/AppBundle`

- Jobeet Tutorial -> `src/Sm/JobsBundle`

So you can uninstall either or both.  You can add your own app, or use this project to see how I put things together (which may or may not be the best way...)

`app/Application/Sonata/UserBundle` is where you will find the admin backend installed since an admin backend is shared with any other app you install in the project.

`app/Resources` is where all the templating and front end work is done.  The Jobeet tutorial has its own folder `JobsBundle` but the Symfony Demo (the Blog app) relies on templates in `app/Resources/views`

`Resources` could be better organized so each app has its own folder (like JobsBundle.)  That would make is easier to add and delete apps as needed.

## Projects

Some of the projects I have integrated into this Symfony demo are: 

- FOS User Bundle 
- FOS Rest Bundle 
- Sonata Admin Bundle
- Slugify
- Faker 
- Alice 
- KPN Menu
- Assetic 
- Scssphp
- Php markdown 
- Swiftmailer

## Data

The demo data is by each app's appFixture.php file.  Jobs and blog posts use fakr data but users data employs an AppFixture that formats according to the needs of FOS User bundler user class.

So, with a little magic from Doctrine you can get it up and running in a flash.

## Caveat

This is a learning project for Symfony and I find the documentation on Symfony a bit thin, so no guarantees about what is best practice.
