package test;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.support.ui.WebDriverWait;

import po.FxgamesContactoPage;
import po.FxgamesHomePage;
import utils.MetodosComunes;
import utils.PropertiesManager;

public class Test07 {
	public static void main(String[] args) {
		// Llamar a los métodos comunes para setear el driver
		String test = "Test07";
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
		String mensajeAlert = "Su consulta se ha registrado correctamente. En breve, tramitaremos su solucitud. Gracias.";
		try {
			// navegar a url
			driver.get(pm.url);
			//Pasos del test
			FxgamesHomePage home = new FxgamesHomePage(driver, wait);
			traza = "Paso 1 => Se pulsa en el enlace Contacto del footer.";
			home.accederContacto();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 1");
			FxgamesContactoPage contacto = new FxgamesContactoPage(driver, wait);
			traza = "Paso 2 => Se rellenan los campos marcados con asterisco que son obligatorios\r\n" + 
					"Asunto: Prueba\r\n" + 
					"Nombre: Lorena\r\n" + 
					"Apellido: Pérez\r\n" + 
					"Correo electrónico: pruebasfxg@gmail.com\r\n" + 
					"Asunto del mensaje: prueba";
			contacto.escribirAsunto("Prueba");
			contacto.escribirNombre("Lorena");
			contacto.escribirApellido("Pérez");
			contacto.escribirEmail("pruebasfxg@gmail.com");
			contacto.escribirAsuntoMensaje("prueba");
			mc.writeReport("INFO", "OK", traza, driver, "Paso 2");
			traza = "Paso 3 => Se pulsa en el botón Enviar.";
			contacto.pulsarEnviar();
			mc.writeReport("INFO", "OK", traza, driver, "Paso 3");
			//comprobación del test
			String mensajeFinal = contacto.leerAlert();
			String res="";
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
				mc.writeExcelReport(test, res, 7, args[0]);
			}
		} catch (Exception e) {
			// cuando uno de los pasos falla, se genera captura de evidencia y su traza de error
			mc.writeReport("ERROR", "KO", traza, driver, "CapturaError");
			if (args.length>0) {
				mc.writeExcelReport(test, "KO", 7, args[0]);
			}
			e.printStackTrace();
		} finally {
			//cerrar el driver
			driver.quit();
		}
	}
}
