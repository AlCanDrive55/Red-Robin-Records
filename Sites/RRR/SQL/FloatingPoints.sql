START TRANSACTION;

SET 
@artistname = 'Floating Points',
@albumname = 'Shadows',
@albumIMG = '',
@year = '2011',
@genrename = 'House',
@track1 = 'Myrtle Avenue',
@track2 = 'Realise',
@track3 = 'Obfuse',
@track4 = 'ARP3',
@track5 = 'Sais',


@trackno = '0',

@mp3AlbumPrice = '4.99',
@cdPrice = '6.99',
@vinylPrice = '21.99';

INSERT INTO `PRODUCT`(`PRICE`, `TYPE`) VALUES (@vinylPrice, 'VINYL'); SET @productvinyl = LAST_INSERT_ID();
INSERT INTO `PRODUCT`(`PRICE`, `TYPE`) VALUES (@cdPrice, 'CD'); SET @productcd = LAST_INSERT_ID();
INSERT INTO `PRODUCT`(`PRICE`, `TYPE`) VALUES (@mp3AlbumPrice, 'ALBUMMP3'); SET @productAlbumMp3 = LAST_INSERT_ID(); 

INSERT INTO ARTIST (ARTIST_NAME) 
VALUES (@artistname)
ON DUPLICATE KEY UPDATE `ARTIST_NAME` = `ARTIST_NAME`;
SET @artist = LAST_INSERT_ID();

INSERT INTO GENRE(GENRE_NAME) VALUES (@genrename)
ON DUPLICATE KEY UPDATE `GENRE_NAME` = `GENRE_NAME`;
set @genre = LAST_INSERT_ID(); 

INSERT INTO ALBUM (ALBUM_NAME, ALBUM_IMG, ARTIST_ID, GENRE_ID, YEAR) 
VALUES (@albumname, @albumIMG, @artist, @genre, @year);
SET @album = LAST_INSERT_ID();
 
INSERT INTO TRACK (TRACK_NAME, ALBUM_ID, TRACK_NO) VALUES (@track1, @album, @trackno + 1); SET @trackno = @trackno+1;
SET @track = LAST_INSERT_ID();
 
INSERT INTO TRACK (TRACK_NAME, ALBUM_ID, TRACK_NO) VALUES (@track2, @album, @trackno + 1); SET @trackno = @trackno+1;
SET @track = LAST_INSERT_ID();

INSERT INTO TRACK (TRACK_NAME, ALBUM_ID, TRACK_NO) VALUES (@track3, @album, @trackno + 1); SET @trackno = @trackno+1;
SET @track = LAST_INSERT_ID();
 
INSERT INTO TRACK (TRACK_NAME, ALBUM_ID, TRACK_NO) VALUES (@track4, @album, @trackno + 1); SET @trackno = @trackno+1;
SET @track = LAST_INSERT_ID();

INSERT INTO TRACK (TRACK_NAME, ALBUM_ID, TRACK_NO) VALUES (@track5, @album, @trackno + 1); SET @trackno = @trackno+1;
SET @track = LAST_INSERT_ID();

INSERT INTO ALBUM_RELEASE (ALBUM_ID, ALBUM_PRODUCT_ID) VALUES (@album, @productvinyl);
INSERT INTO ALBUM_RELEASE (ALBUM_ID, ALBUM_PRODUCT_ID) VALUES (@album, @productcd);
INSERT INTO ALBUM_RELEASE (ALBUM_ID, ALBUM_PRODUCT_ID) VALUES (@album, @productAlbumMP3);

commit;