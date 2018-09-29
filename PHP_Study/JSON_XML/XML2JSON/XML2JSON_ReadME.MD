//Code is very light but it does a lot.
//The nested character of XML or JSON makes it very complicated.
SimpleXMLElement Object
(
    [Book] => Array
        (
            [0] => SimpleXMLElement Object
                (
                    [Title] => A very Good Book
                    [Author] => Jane Doe
                    [PublishingInfo] => SimpleXMLElement Object
                        (
                            [PublisherName] => Sams Publishing
                            [PublisherCity] => Indianapolis
                            [PublishedYear] => 2012
                        )

                )

            [1] => SimpleXMLElement Object
                (
                    [Title] => Bible
                    [Author] => Holy Spirit
                    [PublishingInfo] => SimpleXMLElement Object
                        (
                            [PublisherName] => Unknown
                            [PublisherCity] => Unknown
                            [PublishedYear] => 5000BC
                        )

                )

        )

)
{
    "Book":[
            {
              "Title":"A very Good Book",
              "Author":"Jane Doe",
              "PublishingInfo":{
                                    "PublisherName":"Sams Publishing",
                                    "PublisherCity":"Indianapolis",
                                    "PublishedYear":"2012"}
                                },
            {
                "Title":"Bible",
                "Author":"Holy Spirit",
                "PublishingInfo":{
                                    "PublisherName":"Unknown",
                                    "PublisherCity":"Unknown",
                                    "PublishedYear":"5000BC"
                                  }
            }
        ]
}