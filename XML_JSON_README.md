Oct 1, 2018

User picks XML or JSON.
User picks the number of record.

Based on the user's pick, 
displays the full record and ith record.

                          |-----------------------|
                          |  RepositoryInterface  |
                          |-----------------------|
                                 ^           ^
                                 |           |
                                 |           |
                                 |           |
                         |-------|           |----------|
            |--------------------|               |-------------------|
            |  JsonRepository    |               |  XMLRepository    |
            |--------------------|               |-------------------|
           
           
Defines an Interface with 2 functions.
2 classes implements this interface.

What is good about this is that allows expansion.
What that means is that there can be a new format and given that there is a reader
for this format, this can expand.

