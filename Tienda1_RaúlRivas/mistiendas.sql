-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2024 a las 00:06:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mistiendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `cod` varchar(6) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`cod`, `nombre`) VALUES
('CAMARA', 'Camaras digitales'),
('CONSOL', 'Consolas'),
('EBOOK', 'Libros electronicos'),
('IMPRES', 'Impresoras'),
('MEMFLA', 'Memorias flash'),
('MP3', 'Reproductores MP3'),
('MULTIF', 'Equipos multifuncion'),
('NETBOK', 'Netbooks'),
('ORDENA', 'Ordenadores'),
('PORTAT', 'Ordenadores portatiles'),
('ROUTER', 'Routers'),
('SAI', 'Sistemas de alimentacion ininterrumpida'),
('SOFTWA', 'Software'),
('TV', 'Televisores'),
('VIDEOC', 'Videocamaras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod` varchar(12) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `nombre_corto` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `PVP` decimal(10,2) NOT NULL,
  `familia` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod`, `nombre`, `nombre_corto`, `descripcion`, `PVP`, `familia`) VALUES
('3DSNG', NULL, 'Nintendo 3DS negro', 'Consola portátil de Nintendo que permitirá disfrutar de\r\nefectos 3D sin necesidad de gafas especiales, e incluirá retrocompatibilidad con el software\r\nde DS y de DSi.', 270.00, 'CONSOL'),
('ACERAX3950', NULL, 'Acer AX3950 I5-650 4GB 1TB W7HP', 'Características:\r\n\r\nSistema\r\nOperativo : Windows® 7 Home Premium Original\r\n\r\nProcesador / Chipset\r\nNúmero de Ranuras\r\nPCI: 1\r\nFabricante de Procesador: Intel\r\nTipo de Procesador: Core i5\r\nModelo de\r\nProcesador: i5-650\r\nNúcleo de Procesador: Dual-core\r\nVelocidad de Procesador: 3,20\r\nGHz\r\nCaché: 4 MB\r\nVelocidad de Bus: No aplicable\r\nVelocidad HyperTransport: No\r\naplicable\r\nInterconexión QuickPathNo aplicable\r\nProcesamiento de 64 bits: Sí\r\nHyper-\r\nThreadingSí\r\nFabricante de Chipset: Intel\r\nModelo de Chipset: H57\r\nExpress\r\n\r\nMemoria\r\nMemoria Estándar: 4 GB\r\nMemoria Máxima: 8 GB\r\nTecnología de la\r\nMemoria: DDR3 SDRAM\r\nEstándar de Memoria: DDR3-1333/PC3-10600\r\nNúmero de Ranuras de\r\nMemoria (Total): 4\r\nLector de tarjeta memoria: Sí\r\nSoporte de Tarjeta de Memoria: Tarjeta\r\nCompactFlash (CF)\r\nSoporte de Tarjeta de Memoria: MultiMediaCard (MMC)\r\nSoporte de Tarjeta\r\nde Memoria: Micro Drive\r\nSoporte de Tarjeta de Memoria: Memory Stick PRO\r\nSoporte de\r\nTarjeta de Memoria: Memory Stick\r\nSoporte de Tarjeta de Memoria: CF+\r\nSoporte de Tarjeta\r\nde Memoria: Tarjeta Secure Digital (SD)\r\n\r\nStorage\r\nCapcidad Total del Disco Duro: 1\r\nTB\r\nRPM de Disco Duro: 5400\r\nTipo de Unidad Óptica: Grabadora DVD\r\nCompatibilidad de\r\nDispositivo Óptico: DVD-RAM/±R/±RW\r\nCompatibilidad de Medios de Doble Capa: Sí', 410.00, 'ORDENA'),
('ARCLPMP32GBN', NULL, 'Archos Clipper MP3 2GB negro', 'Características:\r\n\r\nAlmacenamiento\r\nInterno Disponible en 2 GB*\r\nCompatibilidad Windows o Mac y Linux (con soporte para\r\nalmacenamiento masivo)\r\nInterfaz para ordenador USB 2.0 de alta velocidad\r\nBattería2 11\r\nhoras música\r\nReproducción Música3 MP3\r\nMedidas Dimensiones: 52mm x 27mm x 12mm, Peso: 14\r\nGr', 26.70, 'MP3'),
('BRAVIA2BX400', NULL, 'Sony Bravia 32IN FULLHD KDL-32BX400', 'Características:\r\n\r\nFull\r\nHD: Vea deportes películas y juegos con magníficos detalles en alta resolución gracias a la\r\nresolución 1920x1080.\r\n\r\nHDMI®: 4 entradas (3 en la parte posterior, 1 en el\r\nlateral)\r\n\r\nUSB Media Player: Disfrute de películas, fotos y música en el\r\ntelevisor.\r\n\r\nSintonizador de TV HD MPEG-4 AVC integrado: olvídese del codificador y\r\nacceda a servicios de TV que incluyen canales HD con el sintonizador DVB-T y DVB-C integrado\r\ncon decodificador MPEG4 AVC (dependiendo del país y sólo con operadores\r\ncompatibles)\r\n\r\nSensor de luz: ajusta automáticamente el brillo según el nivel de la\r\niluminación ambiental para que pueda disfrutar de una calidad de imagen óptima sin consumo\r\ninnecesario de energía.\r\n\r\nBRAVIA Sync: controle su sistema de ocio doméstico entero con\r\nun mismo mando a distancia universal que le permite reproducir contenidos o ajustar la\r\nconfiguración de los dispositivos compatibles con un solo botón.\r\n\r\nBRAVIA ENGINE 2:\r\nexperimente colores y detalles de imagen increíblemente nítidos y definidos. \r\n\r\nLive\r\nColour™: seleccione entre cuatro modos: desactivado, bajo, medio y alto, para ajustar el color\r\ny obtener imágenes vivas y una calidad óptima. \r\n\r\n24p True Cinema™: reproduzca una\r\nauténtica experiencia cinemática y disfrute de películas exactamente como el director las\r\nconcibió a 24 fotogramas por segundo.', 356.90, 'TV'),
('EEEPC1005PXD', NULL, 'Asus EEEPC 1005PXD N455 1 250 BL', 'Características:\r\nProcesador:\r\n1660 MHz, N455, Intel Atom, 0.5 MB. \r\nMemoria: 1024 MB, 2 GB, DDR3, SO-DIMM, 1 x 1024 MB.\r\n\r\nAccionamiento de disco: 2.5 \", 250 GB, 5400 RPM, \r\nSerial ATA, Serial ATA II, 250 GB.\r\n\r\nMedios de almacenaje: MMC, SD, SDHC. \r\nExhibición: 10.1 \", 1024 x 600 Pixeles, LCD TFT.\r\n\r\nCámara fotográfica: 0.3 MP. \r\nRed: 802.11 b/g/n, 10, 100 Mbit/s, \r\nFast Ethernet.\r\n\r\nAudio: HD. \r\nSistema operativo/software: Windows 7 Starter. \r\nColor: Blanco.\r\n\r\nContro de energía: 8 MB/s, Litio-Ion, 6 piezas, 2200 mAh, 48 W. \r\nPeso y dimensiones:\r\n1270 g, 178 mm, 262 mm, 25.9 mm, 36.5 mm', 245.40, 'NETBOK'),
('HPMIN1103120', NULL, 'HP Mini 110-3120 10.1LED N455 1GB 250GB W7S negro', 'Características:\r\nSistema operativo instalado \r\nWindows® 7 Starter original 32 bits\r\n\r\n\r\nProcesador \r\nProcesador Intel® Atom™ N4551,66 GHz, Cache de nivel 2, 512 KB\r\n\r\n\r\nChipset NM10 Intel® + ICH8m \r\n\r\nMemoria \r\nDDR2 de 1 GB (1 x 1024 MB) \r\nMemoria\r\nmáxima \r\nAdmite un máximo de 2 GB de memoria DDR2 \r\n\r\nRanuras de memoria \r\n1 ranura de\r\nmemoria accesible de usuario \r\n\r\nUnidades internas \r\nDisco duro SATA de 250 GB (5400\r\nrpm) \r\n\r\nGráficos \r\nTamaño de pantalla (diagonal) \r\nPantalla WSVGA LED HP\r\nAntirreflejos de 25,6 cm (10,1\") en diagonal \r\n\r\nResolución de la pantalla \r\n1024 x 600\r\n', 270.00, 'NETBOK'),
('IXUS115HSAZ', NULL, 'Canon Ixus 115HS azul', 'Características:\r\nHS System (12,1 MP)\r\n\r\nZoom 4x, 28 mm. IS Óptico \r\nCuerpo metálico estilizado \r\nPantalla LCD PureColor II G\r\nde 7,6 cm (3,0\") \r\nFull HD. IS Dinámico. HDMI \r\nModo Smart Auto (32 escenas) ', 196.70, 'CAMARA'),
('KSTDT101G2', NULL, 'Kingston DataTraveler 16GB DT101G2 USB2.0 negro', 'Características:\r\nCapacidades — 16GB\r\nDimensiones — 2.19\" x 0.68\" x 0.36\" (55.65mm x\r\n17.3mm x 9.05mm)\r\nTemperatura de Operación — 0° hasta 60° C / 32° hasta 140°\r\nF\r\nTemperatura de Almacenamiento — -20° hasta 85° C / -4° hasta 185° F\r\nSimple — Solo debe\r\nconectarlo a un puerto USB y está listo para ser utilizado\r\nPractico — Su diseño sin tapa\r\ngiratorio, protege el conector USB; sin tapa que perder\r\nGarantizado — Cinco años de\r\ngarantía', 19.20, 'MEMFLA'),
('KSTDTG332GBR', NULL, 'Kingston DataTraveler G3 32GB rojo', 'Características:\r\n\r\nTipo de\r\nproducto Unidad flash USB\r\nCapacidad almacenamiento32GB\r\nAnchura 58.3 mm\r\nProfundidad\r\n23.6 mm\r\nAltura 9.0 mm\r\nPeso 12 g\r\nColor incluido RED\r\nTipo de interfaz USB', 40.00, 'MEMFLA'),
('KSTMSDHC8GB', NULL, 'Kingston MicroSDHC 8GB', 'Kingston tarjeta de memoria flash 8 GB\r\nmicroSDHC\r\nÍndice de velocidad Class 4\r\nCapacidad almacenamiento 8 GB\r\nFactor de\r\nforma MicroSDHC\r\nAdaptador de memoria incluido Adaptador microSDHC a SD\r\nGarantía del\r\nfabricante Garantía limitada de por vida', 10.20, 'MEMFLA'),
('LEGRIAFS306', NULL, 'Canon Legria FS306 plata', 'Características:\r\n\r\nGrabación en\r\ntarjeta de memoria SD/SDHC \r\nLa cámara de vídeo digital de Canon más pequeña nunca vista\r\n\r\nInstantánea de Vídeo (Video Snapshot) \r\nZoom Avanzado de 41x \r\nGrabación Dual (Dual\r\nShot) \r\nEstabilizador de la Imagen con Modo Dinámico \r\nPre grabación (Pre REC) \r\nSistema\r\n16:9 de alta resolución realmente panorámico \r\nBatería inteligente y Carga Rápida\r\n\r\nCompatible con grabador de DVD DW-100 \r\nSISTEMA DE VÍDEO\r\nSoporte de grabación:\r\nTarjeta de memoria extraíble (SD/SDHC)\r\nTiempo máximo de grabación: Variable, dependiendo\r\ndel tamaño de la tarjeta de memoria.\r\nTarjeta SDHC de 32 GB: 20 horas 50 minutos', 175.00, 'VIDEOC'),
('LGM237WDP', NULL, 'LG TDT HD 23 M237WDP-PC FULL HD', 'Características:\r\n\r\nGeneral\r\nTamaño (pulgadas): 23\r\nPantalla LCD: Sí\r\nFormato:\r\n16:9\r\nResolución: 1920 x 1080\r\nFull HD: Sí\r\nBrillo (cd/m2): 300\r\nRatio Contraste:\r\n50.000:1\r\nTiempo Respuesta (ms): 5\r\nÁngulo Visión (°): 170\r\nNúmero Colores (Millones):\r\n16.7\r\n\r\nTV\r\nTDT: TDT HD\r\nConexiones\r\nD-Sub: Sí\r\nDVI-D: Sí\r\nHDMI:\r\nSí\r\nEuroconector: Sí\r\nSalida auriculares: Sí\r\nEntrada audio: Sí\r\nUSB Servicio:\r\nSí\r\nRS-232C Servicio: Sí\r\nPCMCIA: Sí\r\nSalida óptico: Sí', 186.00, 'TV'),
('LJPROP1102W', NULL, 'HP Laserjet Pro Wifi P1102W', 'Impesora laserjet P1102W es facil de\r\ninstalar y usar, ademas de que te ayudara a ahorrar energia y recursos. \r\nOlviadte de los\r\ncables y disfura de la libertad que te proporcina su tecnologia WIFI, imprime facilmente\r\ndesdes cualquier de tu oficina. \r\n\r\nFormato máximo aceptado A4 A2 No\r\nA3 NoA4 Si\r\nA5\r\nSiA6 Si\r\nB5 SiB6 Si\r\nSobres C5 (162 x 229 mm) SiSobres C6 (114 x 162 mm) Si', 99.90, 'IMPRES'),
('OPTIOLS1100', NULL, 'Pentax Optio LS1100', 'La LS1100 con funda de transporte y tarjeta de\r\nmemoria de 2GB incluidas \r\nes la compacta digital que te llevarás a todas partes. \r\nEsta\r\ncámara diseñada por Pentax incorpora un sensor CCD de 14,1 megapíxeles y un objetivo gran\r\nangular de 28 mm.\r\n', 104.80, 'CAMARA'),
('PAPYRE62GB', NULL, 'Lector ebooks Papyre6 con SD2GB + 500 ebooks', 'Marca Papyre \r\nModelo\r\nPapyre 6.1 \r\nUso Lector de libros electrónicos \r\nTecnología e-ink (tinta electrónica,\r\nVizplez) \r\nCPU Samsung Am9 200MHz \r\nMemoria - Interna: 512MB \r\n- Externa: SD/SDHC (hasta\r\n32GB) \r\nFormatos PDF, RTF, TXT, DOC, HTML, MP3, CHM, ZIP, FB2, Formatos de imagen\r\n\r\nPantalla 6\" (600x800px), blanco y negro, 4 niveles de grises ', 205.50, 'EBOOK'),
('PBELLI810323', NULL, 'Packard Bell I8103 23 I3-550 4G 640GB NVIDIAG210', 'Características:\r\n\r\nCPU CHIPSET\r\n\r\nProcesador : Ci3-550\r\nNorthBridge : Intel\r\nH57\r\n\r\nMEMORIA\r\nMemoria Rma : Ddr3 4096 MB\r\n\r\nDISPOSITIVOS DE\r\nALMACENAMIENTO\r\nDisco Duro: 640Gb 7200 rpm\r\nÓptico : Slot Load siper multi Dvdrw\r\nLector\r\nde Tarjetas: 4 in 1 (XD, SD, HC, MS, MS PRO, MMC)\r\n\r\ndispositivos gráficos\r\nMonitor: 23\r\nfHD\r\nTarjeta Gráfica: Nvidia G210M D3 512Mb\r\nMemoria Máxima: Hasta\r\n1918Mb\r\n\r\nAUDIO\r\nAudio Out: 5.1 Audio Out\r\nAudio In: 1 jack\r\nHeasphone in: 1x\r\njack\r\nAltavoces: Stereo\r\n\r\nACCESORIOS\r\nTeclado: Teclado y ratón inalámbrico\r\nMando a\r\ndistancia: EMEA Win7 WMC\r\n\r\n\r\nCOMUNICACIONES\r\nWireless: 802.11 b/g/n mini card\r\n\r\nTarjeta de Red: 10/100/1000 Mbps\r\nBluetooth: Bluethoot\r\nWebcam: 1Mpixel Hd\r\n(1280x720)\r\nTv tuner: mCARD/SW/ DVB-T\r\n\r\nMONITOR\r\nTamaño: 23\"\r\ncontraste:\r\n1000:1\r\nTiempo de respuesta: 5MS\r\nResolución: 1920 X 1080\r\n\r\nPUERTOS E/S\r\nUsb 2.0 :\r\n6\r\nMini Pci-e : 2\r\nEsata: 1\r\n\r\nSISTEMA OPERATIVO\r\nO.S: Microsoft Windows 7 Premium', 761.80, 'ORDENA'),
('PIXMAIP4850', NULL, 'Canon Pixma IP4850', 'Características:\r\n\r\nTipo: chorro de tinta\r\ncartuchos independientes\r\nConexión: Hi-Speed USB\r\nPuerto de impresión directa desde\r\ncamaras\r\nResolución máxima: 9600x2400 ppp\r\nVelocidad impresión: 11 ipm (negro) / 9.3 ipm\r\n(color)\r\nTamaño máximo papel: A4\r\nBandeja entrada: 150 hojas\r\nDimensiones: 43.1 cm x\r\n29.7 cm x 15.3 cm', 97.30, 'IMPRES'),
('PIXMAMP252', NULL, 'Canon Pixma MP252', 'Características:\r\n\r\nFunciones: Impresora,\r\nEscáner , Copiadora\r\nConexión: USB 2.0\r\nDimensiones:444 x 331 x 155 mm\r\nPeso: 5,8\r\nKg\r\n\r\nIMPRESORA\r\nResolución máxima: 4800 x 1200 ppp\r\nVelocidad de\r\nimpresión:\r\nNegro/color: 7,0 ipm / 4,8 ipm\r\nTamaño máximo papel: A4\r\nCARTUCHOS\r\nNegro:\r\nPG-510 / PG-512\r\nColor: CL-511 / CL-513\r\n\r\nESCANER\r\nResolución máxima: 600 x 1200 ppp\r\n(digital: 19200 x 19200)\r\nProfundidad de color: 48/24 bits\r\nArea máxima de escaneado:\r\nA4\r\n\r\nCOPIA\r\nTiempo salida 1ª copia: aprox 39 seg.', 41.60, 'MULTIF'),
('PS3320GB', NULL, 'PS3 con disco duro de 320GB', 'Este Pack Incluye:\r\n- La consola\r\nPlaystation 3 Slim Negra 320GB\r\n- El juego Killzone 3\r\n', 380.00, 'CONSOL'),
('PWSHTA3100PT', NULL, 'Canon Powershot A3100 plata', 'La cámara PowerShot A3100 IS,\r\ninteligente y compacta, presenta la calidad de imagen de Canon en un cuerpo\r\ncompacto y\r\nligero para capturar fotografías sin esfuerzo; es tan fácil como apuntar y\r\ndisparar.\r\nCaracterísticas:\r\n12,1 MP \r\nZoom óptico 4x con IS \r\nPantalla LCD de 6,7 cm\r\n(2,7\") ', 101.40, 'CAMARA'),
('SMSGCLX3175', NULL, 'Samsung CLX3175', 'Características:\r\n\r\nFunción: Impresión color,\r\ncopiadora, escáner\r\nImpresión \r\nVelocidad (Mono)Hasta 16 ppm en A4 (17 ppm en\r\nCarta)\r\nVelocidad (Color)Hasta 4 ppm en A4 (4 ppm en Carta)\r\nSalida de la Primer Página\r\n(Mono)Menos de 14 segundos (Desde el Modo Listo)\r\nResoluciónHasta 2400 x 600 dpi de salida\r\nefectiva\r\nSalida de la Primer Página (Color)Menos de 26 segundos (Dese el Modo\r\nListo)\r\nDuplexManual\r\nEmulaciónSPL-C (Lenguaje de color de impresión\r\nSAMSUNG)\r\n\r\nCopiado \r\nSalida de la Primer Página (Mono)18 segundos\r\nMulticopiado1 ~\r\n99\r\nZoom25 ~ 400 %\r\nFunciones de CopiadoCopia ID, Clonar Copia, Copia N-UP, Copiar\r\nPoster\r\nResoluciónTexto, Texto / Foto, Modo Revista: hasta 600 x 600 ppp, Modo Foto: Hasta\r\n1200 x 1200 ppp\r\nVelocidad (Mono)Hasta 17 ppm en Carta (16 ppm en A4)\r\nVelocidad\r\n(Color)Hasta 4 ppm en Carta (4 ppm en A4 )\r\nSalida de la Primer Página (Color)45\r\nsegundos\r\n\r\nEscaneado \r\n\r\nCompatibilidadNorma TWAIN, Norma WIA (Windows2003 / XP /\r\nVista)\r\nMétodoEscáner plano color\r\nResolución (Óptica)1200 x 1200 dpi\r\nResolución\r\n(Mejorada)4800 x 4800 dpi\r\nEscaneado a Escanear a USB / Carpeta', 190.00, 'MULTIF'),
('SMSN150101LD', NULL, 'Samsung N150 10.1LED N450 1GB 250GB BAT6 BT W7 R', 'Características:\r\n\r\nSistema Operativo Genuine Windows® 7 Starter \r\n\r\nProcesador\r\nIntel® ATOM Processor N450 (1.66GHz, 667MHz, 512KB) \r\n\r\nChipset Intel® NM10\r\n\r\nMemoria\r\ndel Sistema 1GB (DDR2 / 1GB x 1) Ranura de Memoria 1 x SODIMM \r\n\r\nPantalla LCD 10.1\" WSVGA\r\n(1024 x 600), Non-Gloss, LED Back Light Gráficos \r\n\r\nProcesador Gráfico Intel® GMA 3150\r\nDVMT \r\nMemoria Gráfica Shared Memory (Int. Grahpic) \r\n\r\nMultimedia \r\nSonido HD (High\r\nDefinition) Audio \r\nCaracterísticas de Sonido SRS 3D Sound Effect \r\nAltavoces 3W Stereo\r\nSpeakers (1.5W x 2) \r\nCámara Integrada Web Camera \r\n\r\nAlmacenamiento \r\nDisco duro\r\n250GB SATA (5400 rpm S-ATA) \r\n\r\nConectividad\r\nWired Ethernet LAN (RJ45) 10/100 LAN\r\n\r\nWireless LAN 802.11 b/g/N\r\n\r\nBluetooth Bluetooth 3.0 High Speed \r\n\r\nI/O Port\r\n\r\nVGA \r\nHeadphone-out\r\nMic-in\r\nInternal Mic\r\nUSB (Chargable USB included) 3 x USB\r\n2.0 \r\nMulti Card Slot 4-in-1 (SD, SDHC, SDXC, MMC)\r\nDC-in (Power Port)\r\n\r\nTipo de\r\nTeclado 84 keys \r\nTouch Pad, Touch Screen Touch Pad (Scroll Scope, Flat Type)\r\n\r\n\r\nSeguridad\r\nRecovery Samsung Recovery Solution \r\nVirus McAfee Virus Scan (trial\r\nversion) \r\nSeguridad BIOS Boot Up Password / HDD Password \r\nBloqueo Kensington Lock Port\r\n\r\n\r\nBatería \r\nAdaptador 40 Watt Batería \r\n6 Cell Dimensiones ', 260.60, 'NETBOK'),
('SMSSMXC200PB', NULL, 'Samsung SMX-C200PB EDC ZOOM 10X', 'Características:\r\n\r\nSensor de\r\nImagen Tipo 1 / 6” 800K pixel CCD\r\n\r\nLente Zoom Óptico 10 x optico\r\n\r\nCaracterísticas\r\nGrabación Vídeo Estabilizador de Imagen Hiper estabilizador de imagen digital\r\n\r\nInterfaz\r\nTarjeta de Memoria Ranura de Tarjeta SDHC / SD', 127.20, 'VIDEOC'),
('STYLUSSX515W', NULL, 'Epson Stylus SX515W', 'Características:\r\n\r\nResolución máxima5760 x\r\n1440 DPI\r\nVelocidad de la impresión\r\nVelocidad de impresión (negro, calidad normal, A4)36\r\nppm\r\nVelocidad de impresión (color, calidad normal, A4)36 ppm\r\n\r\nTecnología de la\r\nimpresión\r\nTecnología de impresión inyección de tinta\r\nNúmero de cartuchos de impresión4\r\npiezas\r\nCabeza de impresoraMicro Piezo\r\n\r\nExploración\r\nResolución máxima de\r\nescaneado2400 x 2400 DPI\r\nEscaner color: si\r\nTipo de digitalización Escáner\r\nplano\r\nEscanaer integrado: si\r\nTecnología de exploración CIS\r\nWLAN, conexión: si', 77.50, 'MULTIF'),
('TSSD16GBC10J', NULL, 'Toshiba SD16GB Class10 Jewel Case', 'Características:\r\n\r\nDensidad:\r\n16 GB\r\nPINs de conexión: 9 pins\r\nInterfaz: Tarjeta de memoria SD standard\r\ncompatible\r\nVelocidad de Escritura: 20 MBytes/s* \r\nVelocidad de Lectura: 20\r\nMBytes/s*\r\nDimensiones: 32.0 mm (L) × 24.0 mm (W) × 2.1 mm (H)\r\nPeso: 2g\r\nTemperatura: -\r\n25°C a +85°C (Recomendada)\r\nHumedad: 30% to 80% RH (sin condensación)', 32.60, 'MEMFLA'),
('ZENMP48GB300', NULL, 'Creative Zen MP4 8GB Style 300', 'Características:\r\n\r\n8 GB de\r\ncapacidad\r\nAutonomía: 32 horas con archivos MP3 a 128 kbps\r\nPantalla TFT de 1,8 pulgadas y\r\n64.000 colores\r\nFormatos de audio compatibles: MP3, WMA (DRM9), formato Audible\r\n4\r\nFormatos de foto compatibles: JPEG (BMP, TIFF, GIF y PNG\r\nFormatos de vídeo\r\ncompatibles: AVI transcodificado (Motion JPEG)\r\nEcualizador de 5 bandas con 8\r\npreajustes\r\nMicrófono integrado para grabar voz\r\nAltavoz y radio FM incorporada', 58.90, 'MP3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `producto` varchar(12) NOT NULL,
  `tienda` int(11) NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`producto`, `tienda`, `unidades`) VALUES
('3DSNG', 1, 2),
('3DSNG', 2, 1),
('ACERAX3950', 1, 1),
('ARCLPMP32GBN', 2, 1),
('ARCLPMP32GBN', 3, 2),
('BRAVIA2BX400', 3, 1),
('EEEPC1005PXD', 1, 2),
('EEEPC1005PXD', 2, 1),
('HPMIN1103120', 2, 1),
('HPMIN1103120', 3, 2),
('IXUS115HSAZ', 2, 2),
('KSTDT101G2', 3, 1),
('KSTDTG332GBR', 2, 2),
('KSTMSDHC8GB', 1, 1),
('KSTMSDHC8GB', 2, 2),
('KSTMSDHC8GB', 3, 2),
('LEGRIAFS306', 2, 1),
('LGM237WDP', 1, 1),
('LJPROP1102W', 2, 2),
('OPTIOLS1100', 1, 3),
('OPTIOLS1100', 2, 1),
('PAPYRE62GB', 1, 2),
('PAPYRE62GB', 3, 1),
('PBELLI810323', 2, 1),
('PIXMAIP4850', 2, 1),
('PIXMAIP4850', 3, 2),
('PIXMAMP252', 2, 1),
('PS3320GB', 1, 1),
('PWSHTA3100PT', 2, 2),
('PWSHTA3100PT', 3, 2),
('SMSGCLX3175', 2, 1),
('SMSN150101LD', 3, 1),
('SMSSMXC200PB', 2, 1),
('STYLUSSX515W', 1, 1),
('TSSD16GBC10J', 3, 2),
('ZENMP48GB300', 1, 3),
('ZENMP48GB300', 2, 2),
('ZENMP48GB300', 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tlf` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`cod`, `nombre`, `tlf`) VALUES
(1, 'CENTRAL', '600100100'),
(2, 'SUCURSAL1', '600100200'),
(3, 'SUCURSAL2', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `nombre_corto` (`nombre_corto`),
  ADD KEY `familia` (`familia`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`producto`,`tienda`),
  ADD KEY `stock_ibfk_2` (`tienda`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`familia`) REFERENCES `familias` (`cod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`producto`) REFERENCES `productos` (`cod`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`tienda`) REFERENCES `tiendas` (`cod`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
