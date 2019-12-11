-- Create schema script
CREATE TABLE YOGA_CLASS (ID BIGINT NOT NULL AUTO_INCREMENT, CLASSNAME VARCHAR(25), LASTUPDATED TIMESTAMP, PUBLICSHARED BIGINT, CONSTRAINT classid_pk PRIMARY KEY (ID));
CREATE TABLE YOGA_TEACHER (ID BIGINT NOT NULL AUTO_INCREMENT, LASTUPDATED TIMESTAMP, TEACHERNAME VARCHAR(25), CONSTRAINT teacher_pk PRIMARY KEY (ID));
CREATE TABLE YOGA_POSE (ID BIGINT NOT NULL AUTO_INCREMENT, IMAGEPATH VARCHAR(100), LASTUPDATED TIMESTAMP, POSEDESCRIPTION VARCHAR(100), POSENAME VARCHAR(25), CONSTRAINT poseid_pk PRIMARY KEY (ID));
CREATE TABLE YOGA_POSE_CATEGORY (POSECATEGORYNAME VARCHAR(25) NOT NULL, LASTUPDATED TIMESTAMP, CONSTRAINT categoryid_pk PRIMARY KEY (POSECATEGORYNAME));
CREATE TABLE YOGA_CLASS_POSES (YOGA_CLASS_ID BIGINT NOT NULL, YOGA_POSE_ID BIGINT NOT NULL, CONSTRAINT classid_poseid_pk PRIMARY KEY (YOGA_CLASS_ID, YOGA_POSE_ID));
CREATE TABLE YOGA_TEACHER_CLASSES (YOGA_TEACHER_ID BIGINT NOT NULL, YOGA_CLASS_ID BIGINT NOT NULL, CONSTRAINT teacherid_classid_pk PRIMARY KEY (YOGA_TEACHER_ID, YOGA_CLASS_ID));
CREATE TABLE YOGA_POSE_CATEGORIES (YOGA_POSE_ID BIGINT NOT NULL, POSE_CATEGORY_NAME VARCHAR(25) NOT NULL, CONSTRAINT poseid_categoryid_pk PRIMARY KEY (YOGA_POSE_ID, POSE_CATEGORY_NAME));
ALTER TABLE YOGA_CLASS_POSES ADD CONSTRAINT FK_YOGA_CLASS_POSES_YOGA_POSE_ID FOREIGN KEY (YOGA_POSE_ID) REFERENCES YOGA_POSE (ID);
ALTER TABLE YOGA_CLASS_POSES ADD CONSTRAINT FK_YOGA_CLASS_POSES_YOGA_CLASS_ID FOREIGN KEY (YOGA_CLASS_ID) REFERENCES YOGA_CLASS (ID);
ALTER TABLE YOGA_TEACHER_CLASSES ADD CONSTRAINT FK_YOGA_TEACHER_CLASSES_YOGA_TEACHER_ID FOREIGN KEY (YOGA_TEACHER_ID) REFERENCES YOGA_TEACHER (ID);
ALTER TABLE YOGA_TEACHER_CLASSES ADD CONSTRAINT FK_YOGA_TEACHER_CLASSES_YOGA_CLASS_ID FOREIGN KEY (YOGA_CLASS_ID) REFERENCES YOGA_CLASS (ID);
ALTER TABLE YOGA_POSE_CATEGORIES ADD CONSTRAINT FK_YOGA_POSE_CATEGORIES_YOGA_POSE_ID FOREIGN KEY (YOGA_POSE_ID) REFERENCES YOGA_POSE (ID);
ALTER TABLE YOGA_POSE_CATEGORIES ADD CONSTRAINT FK_YOGA_POSE_CATEGORIES_POSE_CATEGORY_NAME FOREIGN KEY (POSE_CATEGORY_NAME) REFERENCES YOGA_POSE_CATEGORY (POSECATEGORYNAME);
CREATE TABLE SEQUENCE (SEQ_NAME VARCHAR(50) NOT NULL, SEQ_COUNT BIGINT, CONSTRAINT  seqname_pk PRIMARY KEY (SEQ_NAME));
INSERT INTO SEQUENCE(SEQ_NAME, SEQ_COUNT) values ('SEQ_GEN', 0);