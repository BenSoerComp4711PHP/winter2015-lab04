DROP TABLE IF EXISTS menu;
CREATE TABLE IF NOT EXISTS menu
( code INT(11) NOT NULL,
  name VARCHAR(32) NOT NULL,
  description VARCHAR(256) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  picture VARCHAR(100) NOT NULL,
  category VARCHAR(1) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO menu (`code`, `name`, `description`, `price`, `picture`, `category`) VALUES
(1, 'Cheese', 'Leave this raw milk, beefy and sweet cheese out for an hour before serving and pair with pear jam.', '2.95', '1.png', 's'),
(2, 'Turkey', 'Roasted, succulent, stuffed, lovingly sliced turkey breast', '5.95', '2.png', 'm'),
(6, 'Donut', 'Disgustingly sweet, topped with artery clogging chocolate and then sprinkled with Pixie dust', '1.25', '6.png', 's'),
(10, 'Bubbly', '1964 Moet Charmon, made from grapes crushed by elves with clean feet, perfectly chilled.', '14.50', '10.png', 'd'),
(11, 'Ice Cream', 'Combination of decadent chocolate topped with luscious strawberry, churned by gifted virgins using only cream from the Tajima strain of wagyu cattle', '3.75', '11.png', 's'),
(8, 'Hot Dog', 'Pork trimmings mixed with powdered preservatives, flavourings, red colouring and drenched in water before being squeezed into plastic tubes. Topped with onions, bacon, chili or cheese - no extra charge.', '6.90', '8.png', 'm'),
(25, 'Burger', 'Half-pound of beef, topped with bacon and served with your choice of a slice of American cheese, red onion, sliced tomato, and Heart Attack Grill''s own unique special sauce.', '9.99', 'burger.png', 'm'),
(21, 'Coffee', 'A delicious cup of the nectar of life, saviour of students, morning kick-starter; made with freshly grounds that you don''t want to know where they came from!', '2.95', 'coffee.png', 'd');
DROP TABLE IF EXISTS orderitems;
CREATE TABLE IF NOT EXISTS `orderitems` (
  order int(11) NOT NULL,
  item int(11) NOT NULL,
  quantity int(11) NOT NULL,
  PRIMARY KEY (`order`,`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders (
  num int(11) NOT NULL,
  date datetime NOT NULL,
  status varchar(1) NOT NULL,
  total decimal(10,2) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;