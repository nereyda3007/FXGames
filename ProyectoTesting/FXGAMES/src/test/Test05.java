package test;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesHomePage;
import po.FxgamesPerfilPage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test05 {
	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test05";
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
		String mensaje = "Usuario o contraseña incorrectos. Por favor, verifique sus datos o proceda a registrarse.";
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
			traza = "Paso 3 => Se introduce en el campo password ADMIN123456";
			perfil.escribirPass("ADMIN123456");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 3");
			traza = "Paso 4 => Se pulsa en el botón Iniciar Sesión.";
			perfil.pulsarIniciarSesion();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 4");
			//comprobación del test
			String res="";
			if (mensaje.equals(perfil.leerAlert())) {
				res ="OK";
				traza = "Resultado => Test OK. "+ mensaje;
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			}else {
				res ="KO";
				traza = "Resultado => Test KO. " ;
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 5, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 5, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
}
