package models;

import java.util.*;

import com.avaje.ebean.Model;
import play.data.format.*;
import play.data.validation.*;

import javax.persistence.*;

/**
 * Created by zyxu on 04/12/2016.
 */

@Entity
@SequenceGenerator(name="seq", initialValue=0, allocationSize=1)
public class Person extends Model{

    @Id
    @GeneratedValue(strategy= GenerationType.SEQUENCE, generator="seq")
    public String id;

    public String name;
    public String age;
    public String gender;

    public String email;

}
