DROP TABLE IF EXISTS `taobao_admin`;
CREATE TABLE `taobao_admin` (
  `id`          SMALLINT(5) UNSIGNED NOT NULL  AUTO_INCREMENT,
  `username`    VARCHAR(50)          NOT NULL  DEFAULT '',
  `password`    VARCHAR(32)          NOT NULL  DEFAULT '',
  `last_ip`     VARCHAR(15)          NOT NULL  DEFAULT '',
  `now_ip`     VARCHAR(15)          NOT NULL  DEFAULT '',
  `last_time`   INT(10) UNSIGNED     NOT NULL  DEFAULT '0',
  `now_time`   INT(10) UNSIGNED     NOT NULL  DEFAULT '0',
  `email`       VARCHAR(50)          NOT NULL  DEFAULT '',
  `status`      TINYINT(1)           NOT NULL  DEFAULT '1',
  `session_id`  VARCHAR(120)         NOT NULL  DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username`(`username`),
  KEY `password`(`password`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `taobao_cate`;
CREATE TABLE `taobao_cate` (
  `id`              INT(5) UNSIGNED      NOT NULL AUTO_INCREMENT,
  `cate_name`       VARCHAR(50)          NOT NULL DEFAULT '',
  `tags`            VARCHAR(50)          NOT NULL DEFAULT '',
  `pid`             SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `sort`            SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `status`          TINYINT(1) UNSIGNED  NOT NULL DEFAULT '0',
  `icon`            VARCHAR(20)          NOT NULL DEFAULT '',
  `taobao_category` VARCHAR(50)          NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cate_name`(`cate_name`)

)
  ENGINE = MyISAM
  AUTO_INCREMENT = 9
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `taobao_products`;
CREATE TABLE `taobao_products` (
  `id`                  BIGINT(10) UNSIGNED  NOT NULL  AUTO_INCREMENT,
  `num_iid`             BIGINT(10) UNSIGNED  NOT NULL  DEFAULT '0'
  COMMENT '商品ID',
  `title`               VARCHAR(120)         NOT NULL  DEFAULT ''
  COMMENT '商品标题',
  `pict_url`            TEXT
  COMMENT '商品主图',
  `small_images`        TEXT
  COMMENT '商品小图列表',
  `reserve_price`       DECIMAL(18, 2)       NOT NULL  DEFAULT '0.00'
  COMMENT '商品一口价格',
  `zk_final_price`      DECIMAL(18, 2)       NOT NULL  DEFAULT '0.00'
  COMMENT '商品折扣价格',
  `user_type`           TINYINT(1)           NOT NULL  DEFAULT '0'
  COMMENT '卖家类型,0表示集市,1表示商城',
  `provcity`            VARCHAR(50)          NOT NULL  DEFAULT ''
  COMMENT '宝贝所在地',
  `item_url`            TEXT
  COMMENT '宝贝商品链接',
  `click_url`           TEXT
  COMMENT '淘客商品链接地址',
  `nick`                VARCHAR(50)          NOT NULL  DEFAULT ''
  COMMENT '卖家昵称',
  `seller_id`           BIGINT(10) UNSIGNED  NOT NULL  DEFAULT '0'
  COMMENT '卖家ID',
  `volume`              INT(4) UNSIGNED      NOT NULL  DEFAULT '0'
  COMMENT '30天销量',
  `tk_rate`             VARCHAR(10)          NOT NULL  DEFAULT '0'
  COMMENT '收入比例，举例，取值为20.00，表示比例20.00%',
  `zk_final_price_wap`  DECIMAL(18, 2)       NOT NULL  DEFAULT '0.00'
  COMMENT '无线折扣价，即宝贝在无线上的实际售卖价格。',
  `event_start_time`    DATETIME             NOT NULL  DEFAULT '1970-01-01 00:00:00'
  COMMENT '招商活动开始时间； 如果该宝贝取自普通选品组，则取值为1970-01-01 00:00:00；',
  `event_end_time`      DATETIME             NOT NULL  DEFAULT '1970-01-01 00:00:00'
  COMMENT '招行活动的结束时间； 如果该宝贝取自普通的选品组，则取值为1970-01-01 00:00:00',
  `category`            INT(5)               NOT NULL  DEFAULT '0'
  COMMENT '后台一级类目',
  `coupon_click_url`    TEXT
  COMMENT '商品优惠券推广链接',
  `coupon_end_time`     DATE                 NOT NULL  DEFAULT '1970-01-01'
  COMMENT '优惠券结束时间',
  `coupon_start_time`   DATE                 NOT NULL  DEFAULT '1970-01-01'
  COMMENT '优惠券开始时间',
  `coupon_info`         VARCHAR(30)          NOT NULL  DEFAULT ''
  COMMENT '优惠券面额',
  `commission_rate`     VARCHAR(10)          NOT NULL  DEFAULT '0'
  COMMENT '佣金比率(%)',
  `coupon_total_count`  INT(4) UNSIGNED      NOT NULL  DEFAULT '0'
  COMMENT '优惠券总量',
  `coupon_remain_count` INT(4) UNSIGNED      NOT NULL  DEFAULT '0'
  COMMENT '优惠券剩余量',
  `cate_id`             SMALLINT(5) UNSIGNED NOT NULL  DEFAULT '0'
  COMMENT '商品的本地所属分类id',
  `activity_id`         SMALLINT(5) UNSIGNED NOT NULL  DEFAULT '0'
  COMMENT '商品的本地所属活动id',
  `item_description`    TEXT COMMENT '宝贝描述（推荐理由）',
  `update_time`         TIMESTAMP            NOT NULL  DEFAULT current_timestamp,
  `is_qiang`  TINYINT(1) NOT NULL DEFAULT '0',
  `qiang_start_time`    DATETIME             NOT NULL  DEFAULT '1970-01-01 00:00:00'
  COMMENT '咚咚抢开始时间，则取值为1970-01-01 00:00:00',
  `qiang_end_time`      DATETIME             NOT NULL  DEFAULT '1970-01-01 00:00:00'
  COMMENT '咚咚抢的结束时间，则取值为1970-01-01 00:00:00',

  PRIMARY KEY (`id`),
  UNIQUE KEY `num_iid`(`num_iid`),
  KEY `volume`(`volume`),
  KEY `coupon_end_time`(`coupon_end_time`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;



DROP TABLE IF EXISTS `taobao_qiang`;
CREATE TABLE `taobao_qiang` (
  `id`             BIGINT(10) UNSIGNED  NOT NULL  AUTO_INCREMENT,
  `num_iid`        BIGINT(10) UNSIGNED  NOT NULL  DEFAULT '0'
  COMMENT '商品ID',
  `title`          VARCHAR(120)         NOT NULL  DEFAULT ''
  COMMENT '商品标题',
  `pic_url`        TEXT
  COMMENT '商品主图',
  `total_amount`   SMALLINT(5) UNSIGNED NOT NULL  DEFAULT '0'
  COMMENT '总库存',
  `click_url`      TEXT
  COMMENT '商品链接（是淘客商品返回淘客链接，非淘客商品返回普通h5链接）',
  `category_name`  VARCHAR(20)          NOT NULL  DEFAULT ''
  COMMENT '类目名称,如潮流女装',
  `zk_final_price` DECIMAL(18, 2)       NOT NULL  DEFAULT '0.00'
  COMMENT '淘抢购活动价',
  `end_time`       DATETIME             NOT NULL  DEFAULT '1970-01-01 00:00:00'
  COMMENT '结束时间',
  `sold_num`       SMALLINT(5) UNSIGNED NOT NULL  DEFAULT '0'
  COMMENT '已抢购数量',
  `start_time`     DATETIME             NOT NULL  DEFAULT '1970-01-01 00:00:00'
  COMMENT '活动开始时间',
  `reserve_price`  DECIMAL(18, 2)       NOT NULL  DEFAULT '0.00'
  COMMENT '商品一口价格',
  `cate_id`        SMALLINT(5) UNSIGNED NOT NULL  DEFAULT '0'
  COMMENT '商品的本地所属分类id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_iid`(`num_iid`),
  KEY `end_time`(`end_time`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `taobao_collect`;
CREATE TABLE `taobao_collect` (
  `id`             SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`           VARCHAR(25)          NOT NULL DEFAULT ''
  COMMENT '采集规则名称',
  `favorites_name` VARCHAR(25)          NOT NULL DEFAULT ''
  COMMENT '选品组名称', /**/
  `favorites_id`   INT(10)              NOT NULL DEFAULT '0'
  COMMENT '选品库的id',
  `type`           TINYINT(1) UNSIGNED  NOT NULL DEFAULT '0'
  COMMENT '佣金类型，0为普通，1为高佣金',
  `page_no`        SMALLINT(5) UNSIGNED NOT NULL DEFAULT '1'
  COMMENT '开始采集的页码',
  `adzone_id`      INT(10) UNSIGNED     NOT NULL,
  `cate_id`        INT(5) UNSIGNED      NOT NULL DEFAULT '0',
  `activity_id`    INT(5) UNSIGNED      NOT NULL DEFAULT '0'
  COMMENT '活动的id',
  `create_time`    DATETIME             NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `favorites_id`(`favorites_id`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;


DROP TABLE IF EXISTS `taobao_quan`;
CREATE TABLE `taobao_quan` (
  `id`          SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`        VARCHAR(25)          NOT NULL DEFAULT ''
  COMMENT '好券采集规则名称',
  `keyword`     VARCHAR(50)          NOT NULL DEFAULT ''
  COMMENT '关键词',
  `total_page`  SMALLINT(5) UNSIGNED NOT NULL DEFAULT '1'
  COMMENT '采集的总页数',
  `adzone_id`   INT(10) UNSIGNED     NOT NULL,
  `cate_id`     INT(5) UNSIGNED      NOT NULL DEFAULT '0',
  `create_time` DATETIME             NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)

)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `taobao_ad`;
CREATE TABLE `taobao_ad` (
  `id`             INT(10) UNSIGNED     NOT NULL AUTO_INCREMENT,
  `ad_name`        VARCHAR(20)          NOT NULL DEFAULT '',
  `sort`           SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `image_url`      VARCHAR(255)         NOT NULL DEFAULT '',
  `link_url`       TEXT,
  `ad_description` VARCHAR(255)         NOT NULL DEFAULT '',
  `type`           TINYINT(1) UNSIGNED  NOT NULL DEFAULT '0'
  COMMENT '0代表PC端广告位，1代表手机端广告位',
  `start_time`     DATETIME             NOT NULL DEFAULT '1970-01-01 00:00:00',
  `end_time`       DATETIME             NOT NULL DEFAULT '1970-01-01 00:00:00',
  `status`         TINYINT(1)           NOT NULL DEFAULT '0'
  COMMENT '是否发布，0为没有发布',
  PRIMARY KEY (`id`),
  KEY `start_time`(`start_time`),
  KEY `end_time`(`end_time`)

)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `taobao_activity`;

CREATE TABLE `taobao_activity` (
  `id`            INT(10) UNSIGNED     NOT NULL AUTO_INCREMENT,
  `activity_name` VARCHAR(20)          NOT NULL DEFAULT '',
  `sort`          SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `start_time`    DATETIME             NOT NULL DEFAULT '1970-01-01 00:00:00',
  `end_time`      DATETIME             NOT NULL DEFAULT '1970-01-01 00:00:00',
  `status`        TINYINT(1)           NOT NULL DEFAULT '0'
  COMMENT '是否首页展示',
  `is_qiang`        TINYINT(1)           NOT NULL DEFAULT '0'
  COMMENT '是否属于咚咚抢活动',
  PRIMARY KEY (`id`),
  UNIQUE KEY `activity_name`(`activity_name`),
  KEY `start_time`(`start_time`),
  KEY `end_time`(`end_time`)

)
  ENGINE = MyISAM
  AUTO_INCREMENT = 1
  DEFAULT CHARSET = utf8;

