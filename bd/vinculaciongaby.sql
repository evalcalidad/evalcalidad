/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MariaDB
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : vinculaciongaby

 Target Server Type    : MariaDB
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 28/08/2024 16:56:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for criterios
-- ----------------------------
DROP TABLE IF EXISTS `criterios`;
CREATE TABLE `criterios`  (
  `id_criterio` int(11) NOT NULL AUTO_INCREMENT,
  `criterio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_criterio` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_criterio`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of criterios
-- ----------------------------
INSERT INTO `criterios` VALUES (1, 'Misión y visión', 1);
INSERT INTO `criterios` VALUES (2, 'Estudios prospectivos y planificación', 1);
INSERT INTO `criterios` VALUES (3, 'Gestión del aseguramiento interno de la calidad', 1);
INSERT INTO `criterios` VALUES (4, 'Programas de vinculación', 1);

-- ----------------------------
-- Table structure for datoscriterios
-- ----------------------------
DROP TABLE IF EXISTS `datoscriterios`;
CREATE TABLE `datoscriterios`  (
  `id_d_c` int(11) NOT NULL AUTO_INCREMENT,
  `crit` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subcrit` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `indicador` varchar(1200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_criterio` int(11) NOT NULL,
  `estado_d_c` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_d_c`) USING BTREE,
  INDEX `fk_criti`(`id_criterio`) USING BTREE,
  CONSTRAINT `fk_criti` FOREIGN KEY (`id_criterio`) REFERENCES `criterios` (`id_criterio`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datoscriterios
-- ----------------------------
INSERT INTO `datoscriterios` VALUES (1, 'La pertinencia es uno de los principios que rigen el Sistema de Educación Superior, establecido en la Ley Orgánica de Educación Superior (LOES, 2010) el criterio se refiere a las capacidades que tiene una carrera para responder y articularse a las demandas del entorno como criterio considera estándares sobre la relación dialéctica de la educación superior, en su oferta de grado, con su contexto. Respecto al principio de Pertinencia es fundamental que la oferta de grado considere la planificación nacional y la política pública en educación superior, así también la normativa relacionada. En particular, para la revisión de pertinencia de carreras, estos estándares consideran las características académicas de programa que respondan a los requerimientos del entorno, particularmente que contribuyan a la planificación nacional para el desarrollo y la reducción de brechas en sectores prioritarios y emergentes.', 'Este subcriterio agrupa estándares relacionados con el contexto interno y externo de una carrera. La pertinencia permite responder a las necesidades del contexto en función de varios elementos, tales como la estructura y organización de la carrera, a visión de corto, mediano y largo plazo, los objetivos estratégicos de la carrera, entre otros.', 'La misión y visión de la carrera son consistentes con la misión y visión institucional, están claramente definidos en cuanto a sus propósitos y objetivos, y guían efectivamente la planificación y ejecución de las actividades académicas.\r\n\r\na) La misión de la Carrera es una representación formal de sus objetivos, características, prioridades, áreas en las que se enfoca, que son notables o de particular interés para la misma.\r\n\r\nb) Los resultados esperados describen el impacto que la Carrera se propone alcanzar en la comunidad académica y en la sociedad.\r\n\r\nc) Las estrategias responden a cómo la Carrera alcanzará su misión y los resultados que espera obtener.', 1, 1);
INSERT INTO `datoscriterios` VALUES (2, 'La pertinencia es uno de los principios que rigen el Sistema de Educación Superior, establecido en la Ley Orgánica de Educación Superior (LOES, 2010) el criterio se refiere a las capacidades que tiene una carrera para responder y articularse a las demandas del entorno como criterio considera estándares sobre la relación dialéctica de la educación superior, en su oferta de grado, con su contexto. Respecto al principio de Pertinencia es fundamental que la oferta de grado considere la planificación nacional y la política pública en educación superior, así también la normativa relacionada. En particular, para la revisión de pertinencia de carreras, estos estándares consideran las características académicas de programa que respondan a los requerimientos del entorno, particularmente que contribuyan a la planificación nacional para el desarrollo y la reducción de brechas en sectores prioritarios y emergentes.', 'Este subcriterio agrupa estándares relacionados con el contexto interno y externo de una carrera. La pertinencia permite responder a las necesidades del contexto en función de varios elementos, tales como la estructura y organización de la carrera, a visión de corto, mediano y largo plazo, los objetivos estratégicos de la carrera, entre otros.', 'La unidad académica que integra la carrera dispone de una planificación que establece objetivos y propósitos coherentes con la misión y visión de la carrera, con el marco institucional y con estudios del estado actual y su prospectiva; además el proceso de planificaciónconsidera la participación de actores relevantes de la comunidad académica y de la institución para su construcción y la evaluación de los resultados esperados.', 2, 1);
INSERT INTO `datoscriterios` VALUES (3, 'La pertinencia es uno de los principios que rigen el Sistema de Educación Superior, establecido en la Ley Orgánica de Educación Superior (LOES, 2010) el criterio se refiere a las capacidades que tiene una carrera para responder y articularse a las demandas del entorno como criterio considera estándares sobre la relación dialéctica de la educación superior, en su oferta de grado, con su contexto. Respecto al principio de Pertinencia es fundamental que la oferta de grado considere la planificación nacional y la política pública en educación superior, así también la normativa relacionada. En particular, para la revisión de pertinencia de carreras, estos estándares consideran las características académicas de programa que respondan a los requerimientos del entorno, particularmente que contribuyan a la planificación nacional para el desarrollo y la reducción de brechas en sectores prioritarios y emergentes.', 'Este subcriterio agrupa estándares relacionados con el contexto interno y externo de una carrera. La pertinencia permite responder a las necesidades del contexto en función de varios elementos, tales como la estructura y organización de la carrera, a visión de corto, mediano y largo plazo, los objetivos estratégicos de la carrera, entre otros.', 'La gestión del aseguramiento interno de la calidad en la carrera está enfocada en el logro de los resultados de aprendizaje esperados para los estudiantes, es coherente con las políticas institucionales de aseguramiento de la calidad y es un insumo fundamental para garantizar la mejora continua a través de mecanismos como la autoevaluación.', 3, 1);
INSERT INTO `datoscriterios` VALUES (4, 'La Pertinencia es uno de los principios que rigen el sistema de educación superior, establecido en la Ley Orgánica de Educación Superior (LOES, 2010). El criterio se refiere a las capacidades de una carrera para responder y articularse a las demandas del entorno. Como criterio del Modelo, considera estándares sobre la relación dialéctica de la educación superior, en su oferta de grado, con su capacidad para responder a las necesidades y problemas del contexto local, regional o nacional.', 'Este subcriterio se enfoca en los resultados de la carrera relacionados con la vinculación con la sociedad, a través del estándar de proyectos de vinculación con la sociedad.', 'La carrera participa en los programas y proyectos institucionales de vinculación con la sociedad relacionados con sus dominios académicos de manera coherente con su misión, visión, objetivos, estrategias y resultados esperados en la docencia e investigación.', 4, 1);

-- ----------------------------
-- Table structure for datosinforma
-- ----------------------------
DROP TABLE IF EXISTS `datosinforma`;
CREATE TABLE `datosinforma`  (
  `id_dato` int(11) NOT NULL AUTO_INCREMENT,
  `carrera_ev` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_ev` date NOT NULL,
  `periodos_ev` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_ind` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tema_vinc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_prof` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_dato`) USING BTREE,
  INDEX `prof`(`id_prof`) USING BTREE,
  CONSTRAINT `prof` FOREIGN KEY (`id_prof`) REFERENCES `profesores` (`id_prof`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of datosinforma
-- ----------------------------
INSERT INTO `datosinforma` VALUES (14, 'Tecnologías de la Información', '2024-07-19', 'a', 'b', 'c', 1, 1);
INSERT INTO `datosinforma` VALUES (15, 'Telemática', '2024-07-19', 'b', 'c', 'd', 3, 1);
INSERT INTO `datosinforma` VALUES (16, 'Ing. Civil', '2024-07-19', 'o', 'p', 'q', 2, 1);

-- ----------------------------
-- Table structure for documentacion
-- ----------------------------
DROP TABLE IF EXISTS `documentacion`;
CREATE TABLE `documentacion`  (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `id_criterio` int(11) NOT NULL,
  `documento` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_doc` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_doc`) USING BTREE,
  INDEX `fk_crit`(`id_criterio`) USING BTREE,
  CONSTRAINT `fk_crit` FOREIGN KEY (`id_criterio`) REFERENCES `criterios` (`id_criterio`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of documentacion
-- ----------------------------
INSERT INTO `documentacion` VALUES (1, 1, '1693534332.pdf', 1);

-- ----------------------------
-- Table structure for evidencias_estudios
-- ----------------------------
DROP TABLE IF EXISTS `evidencias_estudios`;
CREATE TABLE `evidencias_estudios`  (
  `id_ev_e` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `id_preg_ev` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `puntual` float(65, 2) NOT NULL,
  `consistente` float(65, 2) NOT NULL,
  `completa` float(65, 2) NOT NULL,
  `formal` float(65, 2) NOT NULL,
  `valor_ind` float(65, 2) NOT NULL,
  `fecha_registro` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ev_e`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 161 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evidencias_estudios
-- ----------------------------
INSERT INTO `evidencias_estudios` VALUES (145, 16, 14, 4, 'a', 0.35, 0.00, 0.00, 0.00, 0.09, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (146, 16, 15, 3, 'ninguna', 0.70, 0.70, 0.35, 1.00, 0.69, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (147, 16, 16, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (148, 16, 17, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (149, 16, 18, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (150, 16, 19, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (151, 16, 20, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (152, 16, 21, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (153, 16, 22, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (154, 16, 23, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (155, 16, 24, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (156, 16, 25, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (157, 16, 26, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (158, 16, 27, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (159, 16, 28, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');
INSERT INTO `evidencias_estudios` VALUES (160, 16, 29, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:04:28');

-- ----------------------------
-- Table structure for evidencias_gestion
-- ----------------------------
DROP TABLE IF EXISTS `evidencias_gestion`;
CREATE TABLE `evidencias_gestion`  (
  `id_ev_g` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `id_preg_ev` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  `observacion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `puntual` float(65, 2) NOT NULL,
  `consistente` float(65, 2) NOT NULL,
  `completa` float(65, 2) NOT NULL,
  `formal` float(65, 2) NOT NULL,
  `valor_ind` float(65, 2) NOT NULL,
  `fecha_registro` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ev_g`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 89 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evidencias_gestion
-- ----------------------------
INSERT INTO `evidencias_gestion` VALUES (56, 14, 30, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (57, 14, 31, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (58, 14, 32, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (59, 14, 33, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (60, 14, 34, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (61, 14, 35, 3, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (62, 14, 36, 3, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (63, 14, 37, 3, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (64, 14, 38, 3, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (65, 14, 39, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (66, 14, 40, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (67, 15, 30, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (68, 15, 31, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (69, 15, 32, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (70, 15, 33, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (71, 15, 34, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (72, 15, 35, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (73, 15, 36, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (74, 15, 37, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (75, 15, 38, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (76, 15, 39, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (77, 15, 40, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (78, 16, 30, 1, 'n', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (79, 16, 31, 1, 'aa', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (80, 16, 32, 4, 'a', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (81, 16, 33, 3, 'a', 0.35, 0.00, 0.00, 0.00, 0.09, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (82, 16, 34, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (83, 16, 35, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (84, 16, 36, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (85, 16, 37, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (86, 16, 38, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (87, 16, 39, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');
INSERT INTO `evidencias_gestion` VALUES (88, 16, 40, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 14:05:09');

-- ----------------------------
-- Table structure for evidencias_plan
-- ----------------------------
DROP TABLE IF EXISTS `evidencias_plan`;
CREATE TABLE `evidencias_plan`  (
  `id_ev_p` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `id_preg_ev` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `puntual` float(65, 2) NOT NULL,
  `consistente` float(65, 2) NOT NULL,
  `completa` float(65, 2) NOT NULL,
  `formal` float(65, 2) NOT NULL,
  `valor_ind` float(65, 2) NOT NULL,
  `fecha_registro` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ev_p`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 212 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evidencias_plan
-- ----------------------------
INSERT INTO `evidencias_plan` VALUES (172, 14, 1, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (173, 14, 2, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (174, 14, 3, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (175, 14, 4, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (176, 14, 5, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (177, 14, 6, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (178, 14, 7, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (179, 14, 8, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (180, 14, 9, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (181, 14, 10, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (182, 14, 11, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (183, 14, 12, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (184, 14, 13, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (185, 15, 1, 2, 'a', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (186, 15, 2, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (187, 15, 3, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (188, 15, 4, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (189, 15, 5, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (190, 15, 6, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (191, 15, 7, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (192, 15, 8, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (193, 15, 9, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (194, 15, 10, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (195, 15, 11, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (196, 15, 12, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (197, 15, 13, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (198, 16, 1, 2, 'ninguna', 0.35, 0.70, 0.35, 1.00, 0.60, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (199, 16, 2, 4, 'n', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (200, 16, 3, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (201, 16, 4, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (202, 16, 5, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (203, 16, 6, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (204, 16, 7, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (205, 16, 8, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (206, 16, 9, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (207, 16, 10, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (208, 16, 11, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (209, 16, 12, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (210, 16, 13, 1, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:59:29');
INSERT INTO `evidencias_plan` VALUES (211, 14, 1, 3, '', 0.01, 0.01, 0.01, 0.02, 2.00, '2024-07-19 14:06:35');

-- ----------------------------
-- Table structure for evidencias_programas
-- ----------------------------
DROP TABLE IF EXISTS `evidencias_programas`;
CREATE TABLE `evidencias_programas`  (
  `id_ev_pro` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `id_preg_ev` int(11) NOT NULL,
  `id_valor` int(11) NOT NULL,
  `observacion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `puntual` float(65, 2) NOT NULL,
  `consistente` float(65, 2) NOT NULL,
  `completa` float(65, 2) NOT NULL,
  `formal` float(65, 2) NOT NULL,
  `valor_ind` float(65, 2) NOT NULL,
  `fecha_registro` timestamp(0) NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ev_pro`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evidencias_programas
-- ----------------------------
INSERT INTO `evidencias_programas` VALUES (51, 14, 41, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (52, 14, 42, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (53, 14, 43, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (54, 14, 44, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (55, 14, 45, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (56, 14, 46, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (57, 14, 47, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (58, 14, 48, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (59, 14, 49, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (60, 14, 51, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (61, 14, 52, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (62, 14, 53, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (63, 15, 41, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (64, 15, 42, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (65, 15, 43, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (66, 15, 44, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (67, 15, 45, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (68, 15, 46, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (69, 15, 47, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (70, 15, 48, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (71, 15, 49, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (72, 15, 51, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (73, 15, 52, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (74, 15, 53, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (75, 16, 41, 4, 'ninguna', 0.70, 0.00, 0.00, 0.00, 0.17, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (76, 16, 42, 4, 'd', 0.00, 0.70, 0.00, 0.00, 0.17, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (77, 16, 43, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (78, 16, 44, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (79, 16, 45, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (80, 16, 46, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (81, 16, 47, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (82, 16, 48, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (83, 16, 49, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (84, 16, 51, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (85, 16, 52, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (86, 16, 53, 4, '', 0.00, 0.00, 0.00, 0.00, 0.00, '2024-07-19 12:17:37');
INSERT INTO `evidencias_programas` VALUES (87, 15, 43, 2, '', 0.03, 2.00, 4.00, 0.01, 2.00, '2024-07-19 12:52:30');

-- ----------------------------
-- Table structure for permisos
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos`  (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_permiso`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES (1, 'Administrador general');
INSERT INTO `permisos` VALUES (2, 'Usuario General');

-- ----------------------------
-- Table structure for preguntas_ev
-- ----------------------------
DROP TABLE IF EXISTS `preguntas_ev`;
CREATE TABLE `preguntas_ev`  (
  `id_preg_ev` int(11) NOT NULL AUTO_INCREMENT,
  `preg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_preg` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_preg_ev`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of preguntas_ev
-- ----------------------------
INSERT INTO `preguntas_ev` VALUES (1, 'Diseño Curricular de la carrera', '1', 1);
INSERT INTO `preguntas_ev` VALUES (2, 'Plan estratégico de la carrera (PEC) y Plan estratégico institucional. Declaración de la misión, visión y objetivos de la carrera e institucional', '1', 1);
INSERT INTO `preguntas_ev` VALUES (3, 'Documentos que evidencie la alineación de la misión de la carrera con la misión y visión institucional\nnacional de desarrollo.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (4, 'Documentos de estructura organizacional de la carrera en relación a misión, visión y objetivos.\r\n', '1', 1);
INSERT INTO `preguntas_ev` VALUES (5, 'Documentos que evidencien la evaluación y monitorización del impacto de la misión, visión y objetivos de la carrera sujeta a las necesidades del contexto laboral, académico y social.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (6, 'Documento donde se evidencie el análisis ocupacional de los graduados.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (7, 'Documentos que evidencien la articulación de los ejes sustantivos de la IES (docencia, investigación y vinculación con la sociedad) permitiendo la toma de decisiones en función del desarrollo y prospectiva de la carrera.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (8, 'Documentos que evidencien la coherencia de los objetivos de la carrera en función de con la conformación de la planta académica, los grupos y líneas de investigación definidos.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (9, 'Plan estratégico de la carrera (PEC) y Plan estratégico institucional.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (10, '\"Documentos que evidencien el proceso de construcción del Plan Estratégico de carrera - PEC (parte pertinente a el  involucramiento de estudiantes, profesores, autoridades y el entorno).\"', '1', 1);
INSERT INTO `preguntas_ev` VALUES (11, 'Metodología de seguimiento y evaluación del Plan Estratégico de carrera (PEC)	\r\n', '1', 1);
INSERT INTO `preguntas_ev` VALUES (12, 'Proyecto de Carrera.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (13, 'Estructura organizacional de la carrera.', '1', 1);
INSERT INTO `preguntas_ev` VALUES (14, 'Proyecto de carrera', '2', 1);
INSERT INTO `preguntas_ev` VALUES (15, 'Plan estratégico de la carrera (PEC) y Plan estratégico institucional.', '2', 1);
INSERT INTO `preguntas_ev` VALUES (16, 'Documentos que evidencien el proceso de construcción del Plan Estratégico de carrera - PEC (parte pertinente a el  involucramiento de estudiantes, profesores, autoridades y el entorno).', '2', 1);
INSERT INTO `preguntas_ev` VALUES (17, 'Metodología de seguimiento y evaluación del Plan Estratégico de carrera (PEC)', '2', 1);
INSERT INTO `preguntas_ev` VALUES (18, 'Estructura organizacional de la carrera', '2', 1);
INSERT INTO `preguntas_ev` VALUES (19, 'Metodología para la construcción del Plan estratégico de carrera (que considere el análisis de pertinencia y el análisis de prospectiva de la carrera).', '2', 1);
INSERT INTO `preguntas_ev` VALUES (20, 'Documentos que evidencien el análisis del contexto (estudios de pertinencia, de prospectiva y análisis ocupacional de los graduados).', '2', 1);
INSERT INTO `preguntas_ev` VALUES (21, 'Plan Operativo de Carrera', '2', 1);
INSERT INTO `preguntas_ev` VALUES (22, 'Documento de estado actual y prospectiva de la carrera evidenciando la pertiencia local, regional o nacional de la carrera y tendencias mundiales', '2', 1);
INSERT INTO `preguntas_ev` VALUES (23, 'Metodología para la construcción del Plan estratégico de carrera (que considere el análisis de pertinencia y el análisis de prospectiva de la carrera).	', '2', 1);
INSERT INTO `preguntas_ev` VALUES (24, 'Documentos que evidencien el análisis del contexto (estudios de pertinencia, de prospectiva y análisis ocupacional de los graduados).', '2', 1);
INSERT INTO `preguntas_ev` VALUES (25, 'Documentos que evidencie las estrategias para la formación, captación y el fomento de la carrera profesional del personal académico.', '2', 1);
INSERT INTO `preguntas_ev` VALUES (26, 'Documentos que evidencie las estrategias para la adquisición de la infraestructura necesaria.', '2', 1);
INSERT INTO `preguntas_ev` VALUES (27, 'Documentos que evidencie las estrategias para el desarrollo  de redes con instituciones nacionales o internacionales', '2', 1);
INSERT INTO `preguntas_ev` VALUES (28, 'Políticas de la carrera	', '2', 1);
INSERT INTO `preguntas_ev` VALUES (29, 'Documentos que evidencie las estrategias para la articulación de sus políticas con las instancias académicas encargadas del desarrollo, apoyo y promoción de los grupos de investigación existentes en la institución que se relacionan con la carrera	', '2', 1);
INSERT INTO `preguntas_ev` VALUES (30, 'Mecanismos y procesos para garantizar el logro de los resultados de aprendizaje de los estudiantes', '3', 1);
INSERT INTO `preguntas_ev` VALUES (31, 'Informe consolidado que evidencie el logro de resultados de aprendizaje de los estudiantes.', '3', 1);
INSERT INTO `preguntas_ev` VALUES (32, 'Estrategias para mejorar los procesos de enseñanza-aprendizaje a lo largo de la planificación académica en base al aseguramiento interno de la calidad', '3', 1);
INSERT INTO `preguntas_ev` VALUES (33, 'Estrategias definidas en el Plan estratégico de carrera (PEC) en base a resultados obtenidos en el Proceso de Enseñanza Aprendizaje (PEA), autoevaluación del entorno de aprendizaje, seguimiento a estudiantes que rinden el Exámen Nacional de Evaluación de ', '3', 1);
INSERT INTO `preguntas_ev` VALUES (34, 'Informe de la participación de estudiantes y profesores en los procesos de evaluación de la calidad interna y externa donde sus propuestas son consideradas para el logro de los resultados de aprendizaje esperados a traves de mecanismos que posibiliten su ', '3', 1);
INSERT INTO `preguntas_ev` VALUES (35, 'Resoluciones tomadas por las autoridades de la carrera en relación con las propuestas estudiantiles.', '3', 1);
INSERT INTO `preguntas_ev` VALUES (36, 'Metodología de construcción de planes de mejoras/fortalecimiento de la carrera que evidencie el involucramiento de estudiantes, profesores y autoridades.', '3', 1);
INSERT INTO `preguntas_ev` VALUES (37, 'Plan de mejoras  vigente', '3', 1);
INSERT INTO `preguntas_ev` VALUES (38, 'Informe de autoevaluación de la carrera', '3', 1);
INSERT INTO `preguntas_ev` VALUES (39, 'Resultados de los procesos de autoevaluación en los que participan los estudiantes,  incluidos en estrategias para el mejoramiento de la carrera.', '3', 1);
INSERT INTO `preguntas_ev` VALUES (40, 'Difusión y socialización de los resultados de los procesos de autoevaluación y evaluación externa a la comunidad académica', '3', 1);
INSERT INTO `preguntas_ev` VALUES (41, 'Base de datos  de Programas   / Proyectos   en los que  interviene   la carrera  y que han sido ejecutados   durante  el periodo  de análisis.', '4', 1);
INSERT INTO `preguntas_ev` VALUES (42, 'Documentos   que evidencien   las políticas  y/o normativa institucional.', '4', 1);
INSERT INTO `preguntas_ev` VALUES (43, 'Documento que evidencie que los proyectos se estructuran en función a los dominios académicos, la planta docente y líneas de investigación.', '4', 1);
INSERT INTO `preguntas_ev` VALUES (44, 'Documentación que  evidencie la planificación, ejecución, seguimiento y evaluación de los resultados de los programas/proyectos.', '4', 1);
INSERT INTO `preguntas_ev` VALUES (45, 'Reglamento de Vinculación Institucional', '4', 1);
INSERT INTO `preguntas_ev` VALUES (46, 'Proyectos de vinculación con la sociedad en formato establecido por la institución. (SENPLADES)', '4', 1);
INSERT INTO `preguntas_ev` VALUES (47, 'Evidencia de que los proyectos/programas  están articulados con la docencia e investigación', '4', 1);
INSERT INTO `preguntas_ev` VALUES (48, 'Informe final de cumplimiento del proyecto, donde conste la evaluación de cumplimiento de objetivos, metas, indicadores e impacto.', '4', 1);
INSERT INTO `preguntas_ev` VALUES (49, 'Documento   que evidencien   el desarrollo   de los proyectos   de vinculación.', '4', 1);
INSERT INTO `preguntas_ev` VALUES (50, 'Lista de estudiantes y profesores de la carrera que han participado en proyectos de vinculación en el periodo de evaluación', '4', 1);
INSERT INTO `preguntas_ev` VALUES (51, 'Certificado    o  algún   documento    similar   mediante   el  cual  se  evidencien    las actividades   realizadas   por los estudiantes (distributivo de horas, control, seguimiento y evaluación)', '4', 1);
INSERT INTO `preguntas_ev` VALUES (52, 'Distributivo   de   los  docentes   que  evidencien   su  dedicación   horaria  a proyectos de vinculación de la carrera.', '4', 1);
INSERT INTO `preguntas_ev` VALUES (53, 'Convenios interinstitucionales', '4', 1);

-- ----------------------------
-- Table structure for profesores
-- ----------------------------
DROP TABLE IF EXISTS `profesores`;
CREATE TABLE `profesores`  (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_prof` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_prof` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedula_prof` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono_prof` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion_prof` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_prof` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nominacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_prof` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_prof`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profesores
-- ----------------------------
INSERT INTO `profesores` VALUES (1, 'Gabriela', 'Barahona', '123456', '123', 'SE', 'gaby@hotmail.com', 'Contratado', 1);
INSERT INTO `profesores` VALUES (2, 'Javier', 'Marcillo Merino', '8', '', '', '', 'Titular', 1);
INSERT INTO `profesores` VALUES (3, 'JOSE EFRAIN', 'ALAVA CRUZATTY', '1310367824', '', 'PORTOVIEJO', 'jose.alava@unesum.edu.ec', 'Contratado', 1);

-- ----------------------------
-- Table structure for usuario_permisos
-- ----------------------------
DROP TABLE IF EXISTS `usuario_permisos`;
CREATE TABLE `usuario_permisos`  (
  `id_usuario_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario_permiso`) USING BTREE,
  INDEX `fk_u`(`id_usuario`) USING BTREE,
  INDEX `fk_p`(`id_permiso`) USING BTREE,
  CONSTRAINT `fk_p` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_u` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario_permisos
-- ----------------------------
INSERT INTO `usuario_permisos` VALUES (2, 1, 1);
INSERT INTO `usuario_permisos` VALUES (31, 28, 1);
INSERT INTO `usuario_permisos` VALUES (32, 29, 1);
INSERT INTO `usuario_permisos` VALUES (33, 30, 1);
INSERT INTO `usuario_permisos` VALUES (35, 32, 2);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_usuario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono_usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_usuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login_us` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clave_us` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imagen_usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_usuario` tinyint(4) NOT NULL,
  `tipo_usuario` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, '2450241829', 'Angie', 'Montes', '', 'SE', 'a@hotmail.com', 'angie', '038e01023de4e99f95331e24a6aee25717c87da6268dcb3cc7a2b2673d7c8896', '1664491944.jpg', 1, 1);
INSERT INTO `usuarios` VALUES (28, '45544', 'abc', 'abcd', '', '', '', 'abcs', 'dfd65117f5a90cf87c1664e5f6db4d68b2d1e70e6bc2e96f9a5e40e995b0c066', '', 1, 1);
INSERT INTO `usuarios` VALUES (29, '9888', 'ius', 'yy', '', '', '', 'huja', 'dfd65117f5a90cf87c1664e5f6db4d68b2d1e70e6bc2e96f9a5e40e995b0c066', '1690560289.png', 1, 1);
INSERT INTO `usuarios` VALUES (30, '1309181078', 'CARLOS LUIS', 'CONFORME', '', '', '', 'viroca', 'e29d3d0b3bf783afb80aadebb34336b0df48d0e7efd9eef4676c28f39716ec7a', '', 1, 1);
INSERT INTO `usuarios` VALUES (32, '1310054356', 'PAMELA', 'MARCILLO TIGUA', '', '', '', 'pamela', '7602868e3a6dd87d8426dd7732cb4018e7966ca25064e2e8c4cc60962e6679e3', '', 1, 2);

-- ----------------------------
-- Table structure for valoracion
-- ----------------------------
DROP TABLE IF EXISTS `valoracion`;
CREATE TABLE `valoracion`  (
  `id_valor` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float(65, 2) NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `valoracion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_valor` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_valor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of valoracion
-- ----------------------------
INSERT INTO `valoracion` VALUES (1, 0.00, 'Deficiente', 'No alcanza el estándar evidenciando debilidades estructurales que comprometen la consecución de los objetivos y/o la información presenta deficiencia que impiden un análisis adecuado', 1);
INSERT INTO `valoracion` VALUES (2, 0.35, 'Poco satisfactorio', 'No alcanza el estándar evidenciando debilidades estructurales que comprometen la consecución de los objetivos; sin embargo, existen procesos viables a ser implementados', 1);
INSERT INTO `valoracion` VALUES (3, 0.70, 'Cuasi-satisfactorio', 'Presenta debilidades no estructurales que pueden ser solventadas a traves de mejoras en los proceso ya implementados', 1);
INSERT INTO `valoracion` VALUES (4, 1.00, 'Satisfactorio', 'Alcanza el estándar', 1);

-- ----------------------------
-- Table structure for valores_ind
-- ----------------------------
DROP TABLE IF EXISTS `valores_ind`;
CREATE TABLE `valores_ind`  (
  `id_valor` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `valor_ind_1` float(65, 2) NOT NULL,
  `valor_ind_2` float(65, 2) NOT NULL,
  PRIMARY KEY (`id_valor`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of valores_ind
-- ----------------------------
INSERT INTO `valores_ind` VALUES (11, 14, 0.00, 0.00);
INSERT INTO `valores_ind` VALUES (12, 15, 0.05, 0.00);
INSERT INTO `valores_ind` VALUES (13, 16, 0.10, 0.05);

-- ----------------------------
-- Table structure for valores_ind2
-- ----------------------------
DROP TABLE IF EXISTS `valores_ind2`;
CREATE TABLE `valores_ind2`  (
  `id_valor2` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `valor_ind_1` float(65, 2) NOT NULL,
  `valor_ind_2` float(65, 2) NOT NULL,
  PRIMARY KEY (`id_valor2`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of valores_ind2
-- ----------------------------
INSERT INTO `valores_ind2` VALUES (9, 14, 0.00, 0.00);
INSERT INTO `valores_ind2` VALUES (10, 15, 0.00, 0.00);
INSERT INTO `valores_ind2` VALUES (11, 16, 0.11, 0.05);

-- ----------------------------
-- Table structure for valores_ind3
-- ----------------------------
DROP TABLE IF EXISTS `valores_ind3`;
CREATE TABLE `valores_ind3`  (
  `id_valor3` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `valor_ind_1` float(65, 2) NOT NULL,
  `valor_ind_2` float(65, 2) NOT NULL,
  PRIMARY KEY (`id_valor3`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of valores_ind3
-- ----------------------------
INSERT INTO `valores_ind3` VALUES (7, 14, 0.00, 0.00);
INSERT INTO `valores_ind3` VALUES (8, 15, 0.00, 0.00);
INSERT INTO `valores_ind3` VALUES (9, 16, 0.19, 0.01);

-- ----------------------------
-- Table structure for valores_ind4
-- ----------------------------
DROP TABLE IF EXISTS `valores_ind4`;
CREATE TABLE `valores_ind4`  (
  `id_valor4` int(11) NOT NULL AUTO_INCREMENT,
  `id_dato` int(11) NOT NULL,
  `valor_ind_1` float(65, 2) NOT NULL,
  `valor_ind_2` float(65, 2) NOT NULL,
  PRIMARY KEY (`id_valor4`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of valores_ind4
-- ----------------------------
INSERT INTO `valores_ind4` VALUES (6, 14, 0.00, 0.00);
INSERT INTO `valores_ind4` VALUES (7, 15, 0.00, 0.00);
INSERT INTO `valores_ind4` VALUES (8, 16, 0.09, 0.03);

SET FOREIGN_KEY_CHECKS = 1;
