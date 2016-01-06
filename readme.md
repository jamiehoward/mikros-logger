## Mikros Logger

Mikros Logger is intended to serve as an off-site logger API for use in analytics and debugging.

## Logging information

Once deployed on server example.com, a POST request to example.com/test would create a *project* called
"test", and would immediately log basic request information such as IP address and timestamp as a *record*.

## Viewing log

In the previous example, visiting example.com/test in a web browser (i.e. a GET request) would display all records
submitted to that project thus far.