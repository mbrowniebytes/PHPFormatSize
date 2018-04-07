# PHPFormatSize

Simple PHP formatter for bytes

```
$this->formatSize = new FormatSize();

$bytes = 4398046511104;
$decimals = 2;
$formatted = $this->formatSize->formatBytes($bytes, $decimals);
$this->assertEquals('4.00 TB', $formatted); 
```
