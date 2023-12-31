USE [master]
GO
/****** Object:  Database [bd_ticket]    Script Date: 25/07/2023 12:16:47 p. m. ******/
CREATE DATABASE [bd_ticket]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'bd_ticket', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\bd_ticket.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'bd_ticket_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.MSSQLSERVER\MSSQL\DATA\bd_ticket_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [bd_ticket] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [bd_ticket].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [bd_ticket] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [bd_ticket] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [bd_ticket] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [bd_ticket] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [bd_ticket] SET ARITHABORT OFF 
GO
ALTER DATABASE [bd_ticket] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [bd_ticket] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [bd_ticket] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [bd_ticket] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [bd_ticket] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [bd_ticket] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [bd_ticket] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [bd_ticket] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [bd_ticket] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [bd_ticket] SET  DISABLE_BROKER 
GO
ALTER DATABASE [bd_ticket] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [bd_ticket] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [bd_ticket] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [bd_ticket] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [bd_ticket] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [bd_ticket] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [bd_ticket] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [bd_ticket] SET RECOVERY FULL 
GO
ALTER DATABASE [bd_ticket] SET  MULTI_USER 
GO
ALTER DATABASE [bd_ticket] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [bd_ticket] SET DB_CHAINING OFF 
GO
ALTER DATABASE [bd_ticket] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [bd_ticket] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [bd_ticket] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [bd_ticket] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'bd_ticket', N'ON'
GO
ALTER DATABASE [bd_ticket] SET QUERY_STORE = OFF
GO
USE [bd_ticket]
GO
/****** Object:  Table [dbo].[departament]    Script Date: 25/07/2023 12:16:48 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[departament](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[departamento] [nvarchar](191) NOT NULL,
	[estado] [nvarchar](191) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 25/07/2023 12:16:48 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](191) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[personal_access_tokens]    Script Date: 25/07/2023 12:16:48 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[personal_access_tokens](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[tokenable_type] [nvarchar](191) NOT NULL,
	[tokenable_id] [bigint] NOT NULL,
	[name] [nvarchar](191) NOT NULL,
	[token] [nvarchar](64) NOT NULL,
	[abilities] [nvarchar](max) NULL,
	[last_used_at] [datetime] NULL,
	[expires_at] [datetime] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[ticket]    Script Date: 25/07/2023 12:16:48 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[ticket](
	[folio] [nvarchar](191) NOT NULL,
	[departamentosReportan] [nvarchar](191) NOT NULL,
	[departamentosAtencion] [nvarchar](191) NOT NULL,
	[prioridad] [nvarchar](191) NOT NULL,
	[descripcion] [nvarchar](191) NOT NULL,
	[evidencia] [varbinary](max) NULL,
	[usuarioAtencion] [nvarchar](191) NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [ticket_folio_primary] PRIMARY KEY CLUSTERED 
(
	[folio] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 25/07/2023 12:16:48 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[user] [nvarchar](191) NOT NULL,
	[user_password] [nvarchar](191) NOT NULL,
	[roles] [nvarchar](191) NOT NULL,
	[date_modification] [date] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
 CONSTRAINT [PK_users] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_token_unique]    Script Date: 25/07/2023 12:16:49 p. m. ******/
CREATE UNIQUE NONCLUSTERED INDEX [personal_access_tokens_token_unique] ON [dbo].[personal_access_tokens]
(
	[token] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [personal_access_tokens_tokenable_type_tokenable_id_index]    Script Date: 25/07/2023 12:16:49 p. m. ******/
CREATE NONCLUSTERED INDEX [personal_access_tokens_tokenable_type_tokenable_id_index] ON [dbo].[personal_access_tokens]
(
	[tokenable_type] ASC,
	[tokenable_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
USE [master]
GO
ALTER DATABASE [bd_ticket] SET  READ_WRITE 
GO
