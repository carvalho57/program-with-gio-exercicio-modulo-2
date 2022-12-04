USE app;

CREATE TABLE IF NOT EXISTS Transaction (
    id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    checked VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL
);

INSERT INTO `Transaction` 
    (date,checked,description,amount)
    VALUES 
    ('2021-04-01','7777','Transaction 1',150.43),
    ('2021-05-01','','Transaction 2',700.25),
    ('2021-06-01','','Transaction 3',-1303.97),
    ('2021-07-01','','Transaction 4',46.78),
    ('2021-08-01','','Transaction 5',816.87),
    ('2021-11-01','1934','Transaction 6',-1002.53),
    ('2021-12-01','7307','Transaction 7',532.22),
    ('2022-01-01','1352','Transaction 8',-704.59),
    ('2022-02-01','','Transaction 9',98.04),
    ('2022-03-01','','Transaction 10',-204.56),
    ('2023-01-01','','Transaction 11',1056.27),
    ('2023-02-01','','Transaction 12',550.10),
    ('2023-03-01','','Transaction 13',-825.77),
    ('2023-04-01','4250','Transaction 14',212.68),
    ('2023-05-01','','Transaction 15',195.68),
    ('2021-02-02','9915','Transaction 16',-463.75),
    ('2021-03-02','','Transaction 17',78.02),
    ('2021-04-02','','Transaction 18',268.81),
    ('2021-05-02','','Transaction 19',1360.55),
    ('2021-08-02','','Transaction 20',-594.46),
    ('2021-09-02','9125','Transaction 21',467.39),
    ('2021-10-02','','Transaction 22',39.49),
    ('2021-11-02','7929','Transaction 23',-81.87),
    ('2021-12-02','','Transaction 24',255.64),
    ('2021-12-02','','Transaction 25',13.51);