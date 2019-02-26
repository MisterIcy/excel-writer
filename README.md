# ExcelWriter

ExcelWriter is a library that tries to abstract PHPSpreadsheet in order to facilitate
the creation of excel reports from arrays and objects

## Usage

To generate a report, you have to create a collection of Properties, that will be used
to get values from objects / arrays, and will better format your document. Also, you have to 
create a generator

```php
//Create a generator
$generator = new BasicGenerator();

//Add handlers to the generator
$generator
    ->setHandler(new MetadataHandler())
    ->setNext(new FormatHandler())
    ->setNext(new DataHandler());

//Create a property collection
$properties = new PropertyCollection();

//Create a simple index Property
$properties->addProperty(
    PropertyBuilder::createProperty(IntProperty::class, null, true, '={row}-1')
        ->setTitle('id')
    )
    ->addProperty(
        PropertyBuilder::createProperty(StringProperty::class, 'name')
            ->setTitle('name')
            ->setWidth(30)
        )
    ->addProperty(
        PropertyBuilder::createProperty(IntProperty::class, 'age')
            ->setTitle('age')
            ->setWidth(15)
            ->setCallable(function($d) { return ($d<18) ? 'N/A': $d; })
        );    
//Generate the writer

$writer = ExcelWriter::createWriter($generator, $properties);
/* Get your data in $data (array of objects) */
$data = $this->getData();

$file = $writer->generateFile($data, $filename);
```

