package controllers;

import com.avaje.ebean.Ebean;
import com.avaje.ebean.Model;
import com.avaje.ebean.Update;
import com.fasterxml.jackson.databind.JsonNode;
import models.Person;
import play.data.DynamicForm;
import play.data.Form;
import play.mvc.*;

import views.html.*;

import java.util.List;

import static play.libs.Json.toJson;

/**
 * This controller contains an action to handle HTTP requests
 * to the application's home page.
 */
public class HomeController extends Controller {

    /**
     * An action that renders an HTML page with a welcome message.
     * The configuration in the <code>routes</code> file means that
     * this method will be called when the application receives a
     * <code>GET</code> request with a path of <code>/</code>.
     */
    public  Result index() {
        return ok(index.render("Your new application is ready."));
    }

    public  Result addPerson(){
        Person person = Form.form(Person.class).bindFromRequest().get();
        person.save();
        return redirect(routes.HomeController.index());
    }

    public Result getPersons(){
        List<Person> persons = new Model.Finder(String.class, Person.class).all();
        return ok(toJson(persons));
//        return redirect(routes.HomeController.index());
    }

    public Result deletePersons(){

        try {
            String[] strings = request().body().asFormUrlEncoded().get("select");
            Update<Person> upd = Ebean.createUpdate(Person.class, "DELETE Person WHERE id=:id");

            for (String id : strings) {
                upd.set("id", id);
                upd.execute();
            }
            return redirect(routes.HomeController.index());
        }
        catch (Exception e){
            e.printStackTrace();
            return redirect(routes.HomeController.index());
        }
    }

}
