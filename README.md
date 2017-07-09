# Twitter Stream API Symfony Bundle
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg)]()
[![Latest Unstable Version](https://poser.pugx.org/mineur/instagram-parser-bundle/v/unstable)](https://packagist.org/packages/mineur/instagram-parser-bundle)
[![Total Downloads](https://poser.pugx.org/mineur/instagram-parser-bundle/downloads)](https://packagist.org/packages/mineur/instagram-parser-bundle)

A Symfony integration of Mineur Instagram Parser Library.

![](https://thumbs.gfycat.com/IcyImpossibleChrysomelid-size_restricted.gif)

## Installation
```php
composer require mineur/instagram-parser-bundle:dev-master
```

## Basic initialization
Register this bundle into your application kernel.

```php
// app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new Mineur\InstagramParserBundle\InstagramParserBundle(),
        ];
    }
}
```

Then add your query ID in your config file:
```yaml
# app/config/config.yml

instagram_parser:
    query_id: '%your_query_id%'
```

## Simple custom command usage
```php
// Controllers/DemoController.php

class DemoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        //...
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var InstagramParser $instagramParser */
        $instagramParser = $this
            ->getContainer()
            ->get('instagram_parser');
        $instagramParser
            ->parse(function(InstagramPost $post) {
                // you can do whatever you want with this output
                // prompt it, enqueue it, persist it into a database ...
                $output->writeln($post);
            });
    }
}
```
Check out the library for full customization of the public stream: 
[instagram-parser](https://github.com/mineur/instagram-parser) 

## Command line actions
Tu use the pre-configured commands:
* To prompt the stream feed on your terminal:
```php
bin/console mineur:instagram-parser:consume hello
```
* To enqueue the stream output as a serialized objects in a FIFO Redis queue, 
type the following:
> This part is subject to RSQueue library and RSQueueBundle. I recommend you to 
> check the [RSQueue documentation](https://github.com/rsqueue/RSQueueBundle) 
> to consume the enqueued objects. 
```php
bin/console mineur:instagram-parser:enqueue
```

## The InstagramPost output
Consuming the stream will give you an infinite loop of hydrated InstagramPost objects, 
similar to this one:
```php
Mineur\InstagramParser\Model\InstagramPost {#36
  -id: 1539101913268979330
  -comment: """
    ¡Disfruta del sol pero sin quemarte! #wearsunscream #cremasolar
    """
  -commentsCount: 0
  -shortCode: "BVb_QkdhaC"
  -takenAtTimestamp: "149769267"
  -dimensions: Mineur\InstagramParser\Model\MediaDimensions {#31
    -height: 1079
    -width: 1080
  }
  -likesCount: 21
  -mediaSrc: "https://scontent-mrs1-1.cdnins/672_n.jpg"
  -thumbnailSrc: "https://cdninstagr.am/84672_n.jpg"
  -ownerId: "1103553924"
  -video: false
  -commentsDisabled: false
}
```
