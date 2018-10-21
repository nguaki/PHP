This is an effort to improve autoload using composer.
Configure composer.json.
But this time by using namespace. 

Adding namespace to each class is a work.
When using the namespaced class(fully qualified class) requires 'use' statement.
However, when a project gets really big, this will make things a lot organized.

The drawback of this method is that composer.json needs to keep on adding
new directory path whenever new classes are added under a new file structure.