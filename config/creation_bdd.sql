DROP TABLE IF EXISTS `t_posts_pst`;
CREATE TABLE IF NOT EXISTS `t_posts_pst`
	(
		pst_id      INTEGER (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		pst_title   VARCHAR (48) NOT NULL,
		pst_content LONGTEXT NOT NULL,
		pst_date    DATETIME NOT NULL,
		pic_id      INTEGER (11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `t_comments_cmt`;
CREATE TABLE IF NOT EXISTS `t_comments_cmt`
	(
		cmt_id      INTEGER (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		cmt_author  VARCHAR (32) NOT NULL,
		cmt_content LONGTEXT NOT NULL,
		cmt_date    DATETIME NOT NULL,
		pst_id      INTEGER (11) NOT NULL,
		cmt_report  BOOLEAN NOT NULL DEFAULT FALSE
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `t_picture_pic`;
CREATE TABLE IF NOT EXISTS `t_picture_pic`
	(
		pic_id    INTEGER (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		pic_link  TEXT NOT NULL,
		pic_title VARCHAR (32) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

ALTER TABLE t_posts_pst ADD CONSTRAINT t_picture_pic_FK FOREIGN KEY ( pic_id ) REFERENCES t_picture_pic ( pic_id );

ALTER TABLE t_comments_cmt ADD CONSTRAINT t_posts_pst_FK FOREIGN KEY ( pst_id ) REFERENCES t_posts_pst ( pst_id );