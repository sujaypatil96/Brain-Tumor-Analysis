Scalable and Efficient Genomic Data Store

Full-stack application for efficient storage and retrieval of large-scale clinical and genomic data for brain tumors.

For any contemporary clinical research, it is important to have clinical data about samples that are used in research along with large-scale molecular data. It is also essential to integrate in-house data with publicly available data. We want to collate glioma datasets including omics, radiology and pathology domains, and other clinical data that are publicly available with our in-house generated datasets.
We also want to include brain related omics data from repositories like Allen Institute for Brain Science and Barres neurobiology lab at Stanford. It is important
to store this big data in a format that allows for fast querying which makes relational databases a poor choice. The goal of this project will be to develop a clinical and genomic database for efficient storage and retrieval using NoSQL databases like MongoDB (Document Store).

### Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

Technology Stack

| System (s/w)  | Description       | Version|
| ------------- |:-----------------:|-------:|
| Apache        | Web Server        |  2.4   |
| PHP           | Application Layer |  5.4   |
| Search Engine | Elasticsearch     |  2.4   |
| MongoDB       | Database Layer    |  3.4   |

1. If you are on a Windows machine, you can consider installing the XAMPP technology stack.

Note: Find the XAMPP stack for Windows download [link here](https://www.apachefriends.org/index.html)

2. There are some changes that need to be made in the httpd.conf file for Apache in order to integrate it with MongoDB.

3. You need to download the appropriate driver for your version of XAMPP and copy the .dll file to XAMPP.

4. Register mongo .dll file within php.ini, by adding the following line extension=php_mongodb.dll.

5. To test if it worked - Restart XAMPP and refresh phpinfo.php page.

Note: Find detailed instructions to perform the above in the [link here](https://learnedia.com/install-mongodb-configure-php-xampp-windows/).

6. If that worked, then you need to naviagte to the index.php page within the landing source files folder and find
the tabs you can navigate to there.

Existing Features



