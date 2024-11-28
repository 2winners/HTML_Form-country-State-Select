# HTML_Form-country-State-Select
Premade Simple Country and Automatic State/Province options  
uses :
#HTML
#PHP
#JS

This HTML - PHP - JS code can be used to easy implement a SELECT form field where you want any country and then Any state of that country 
the simple json format where the options are Pre Optioned and just need to be print or inserted into the HTML
```json

{
  "Countries": {
    "CountryName": {
      "option": "<option value='CountryName'>CountryName</option>",
      "phonecode":"0",
      "States": [
        "<option value='State1'>State1</option>",
        "<option value='State2'>State2</option>"
      ]
    },
    "United Kingdom":{
       "Option":"\u003Coption value='United Kingdom'\u003EUnited Kingdom\u003C\/option\u003E",
       "phonecode":"44",
       "States":{
          "England":"\u003Coption value='England'\u003EEngland\u003C\/option\u003E",
          "Northern Ireland":"\u003Coption value='Northern Ireland'\u003ENorthern Ireland\u003C\/option\u003E",
          "Scotland":"\u003Coption value='Scotland'\u003EScotland\u003C\/option\u003E",
          "Wales":"\u003Coption value='Wales'\u003EWales\u003C\/option\u003E"
       }
    },
    ...
  }
}

```
