Oct 20, 2018

i├── app
│   ├── models
│   │   └── User.php
│   └── start.php
└── index.php

Including class files manually.

start.php has a list of all require_once statements of all classes.

index.php  will refer to require_once "models/start.php".

This method is fine except that whenever there is a new class added,
the new file name that defines the new class has to be included.

It is not the end of the world, but there is a better way.
