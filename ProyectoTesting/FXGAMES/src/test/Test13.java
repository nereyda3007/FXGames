package test;

import java.util.Random;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesHomePage;
import po.FxgamesPerfilPage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test13 {
	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test13";
		PropertiesManager pm = new PropertiesManager();
		pm.readProperies();
		pm.rutaEvidencias = pm.rutaEvidencias + "//"+test;
		MetodosComunes mc = new MetodosComunes();
		mc.setRutaEvidencias(pm.rutaEvidencias);
		mc.createFolderTest();
		pm.rutaEvidencias = mc.rewrite(pm.sobreescribir);
		mc.setRutaEvidencias(pm.rutaEvidencias);
		mc.createFolderTest();
		WebDriver driver = mc.setearDriver(pm.headless);
		WebDriverWait wait = mc.setearWait(driver, pm.tiempo);
		mc.maximizar(driver);
		//Se crean los mensajes para las evidencias
		String traza = "";
		String cadenaAleatoria = "";
		try {
			// navegar a url
			driver.get(pm.url);
			//Pasos del test
			FxgamesHomePage home = new FxgamesHomePage(driver, wait);
			traza = "Paso 1 => Acceder a la pantalla de perfil pulsando el icono del avatar arriba a la derecha";
			home.accederPerfil();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 1");
			FxgamesPerfilPage perfil = new FxgamesPerfilPage(driver, wait);
			traza = "Paso 2 => Se introduce en el campo email pruebasfxg@gmail.com";
			perfil.escribirEmailIniciar("pruebasfxg@gmail.com");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 2");
			traza = "Paso 3 => Se introduce en el campo password fxgtesting";
			perfil.escribirPass("fxgtesting");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 3");
			traza = "Paso 4 => Se pulsa en el botón Iniciar Sesión.";
			perfil.pulsarIniciarSesion();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 4");
			traza = "Paso 5 => Se pulsa en Editar datos personales";
			perfil.pulsarDatosPersonales();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 5");
			traza = "Paso 6 => Se rellenan los campos a modificar y el campo contraseña actual que es obligatorio.\r\n" + 
					"Nombre: (Cadena aleatoria)";
			cadenaAleatoria = nombreAleatorio();
			perfil.escribirNombre(cadenaAleatoria);
			perfil.escribirPassDatos("fxgtesting");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 6");
			traza = "Paso 7 => Se pulsa en el botón Editar Perfil.";
			perfil.pulsarEditarPerfil();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 7");
			//comprobación del test
			String res="";
			if (cadenaAleatoria.equals(perfil.leerNombreModificado())) {
				res ="OK";
				traza = "Resultado => Test OK. ";
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			}else {
				res ="KO";
				traza = "Resultado => Test KO. " ;
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 13, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 13, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
	
	public static String nombreAleatorio() {
		char[] chars = "abcdefghijklmnopqrstuvwxyz".toCharArray();
		StringBuilder sb = new StringBuilder(8);
		Random random = new Random();
		for (int i = 0; i < 8; i++) {
		       char c = chars[random.nextInt(chars.length)];
		       sb.append(c);
		}
		return sb.toString();
	}
}
