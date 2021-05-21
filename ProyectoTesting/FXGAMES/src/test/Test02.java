package test;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesHomePage;
import po.FxgamesPerfilPage;
import po.FxgamesRegistroPage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test02 {

	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test02";
		PropertiesManager pm = new PropertiesManager();
		pm.readProperies();
		pm.rutaEvidencias = pm.rutaEvidencias+"//"+test;
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
		String mensajeAlert = "Correo ya registrado. Por favor inicie sesión.";
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
			perfil.escribirEmail("pruebasfxg@gmail.com");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 2");
			traza = "Paso 3 => Se pulsa en el botón Crear cuenta";
			perfil.pulsarCrearCuenta();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 3");
			FxgamesRegistroPage registro = new FxgamesRegistroPage(driver, wait);
			traza = "Paso 4 => Se rellenan los campos marcados con asterisco que son obligatorios\r\n"
					+ "Nombre: Lorena\r\n" + "Apellido: Pérez\r\n" + "Contraseña: fxgtesting\r\n"
					+ "FechaNacimiento: 01011998\r\n"
					+ "Se aceptan los términos de contrato y las condiciones generales.";
			registro.escribirNombre("Lorena");
			registro.escribirApellido("Pérez");
			registro.escribirPassword("fxgtesting");
			registro.escribirFechaNac("01011998");
			registro.pulsarAcuerdo();
			registro.pulsarCondiciones();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 4");
			traza = "Paso 5 => Se pulsa el botón Registrarse.";
			registro.pulsarRegistrarse();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 5");
			String mensajeFinal = registro.leerAlert();
			String res="";
			//comprobación del test
			if (mensajeAlert.equals(mensajeFinal)) {
				res ="OK";
				traza = "Resultado => Test OK. " + mensajeFinal;
				mc.writeReport("INFO", res, traza, driver, "Resultado");
			} else {
				res ="KO";
				traza = "Resultado => Test KO. " + mensajeFinal;
				mc.writeReport("ERROR", res, traza, driver, "Resultado");
			}
			if (args.length>0) {
				mc.writeExcelReport(test, res, 2, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 2, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}

}
